import React, { useEffect, useRef, useState } from "react";
import { cn } from "@/lib/utils";

type AnimationDirection = "up" | "down" | "left" | "right" | "fade";

interface RevealOnScrollProps extends React.HTMLAttributes<HTMLDivElement> {
  direction?: AnimationDirection;
  delay?: number;
  duration?: number;
  distance?: number;
  threshold?: number;
  once?: boolean;
  children: React.ReactNode;
}

export function RevealOnScroll({
  direction = "up",
  delay = 0,
  duration = 700,
  distance = 50,
  threshold = 0.1,
  once = true,
  children,
  className,
  ...props
}: RevealOnScrollProps) {
  const [isVisible, setIsVisible] = useState(false);
  const [hasAnimated, setHasAnimated] = useState(false);
  const ref = useRef<HTMLDivElement>(null);

  useEffect(() => {
    const observer = new IntersectionObserver(
      ([entry]) => {
        if (entry.isIntersecting && (!once || !hasAnimated)) {
          setIsVisible(true);
          if (once) setHasAnimated(true);
        } else if (!once) {
          setIsVisible(false);
        }
      },
      { threshold },
    );

    const currentRef = ref.current;
    if (currentRef) {
      observer.observe(currentRef);
    }

    return () => {
      if (currentRef) {
        observer.unobserve(currentRef);
      }
    };
  }, [threshold, once, hasAnimated]);

  // Define initial and animated styles based on direction
  const getInitialStyles = () => {
    switch (direction) {
      case "up":
        return { opacity: 0, transform: `translateY(${distance}px)` };
      case "down":
        return { opacity: 0, transform: `translateY(-${distance}px)` };
      case "left":
        return { opacity: 0, transform: `translateX(${distance}px)` };
      case "right":
        return { opacity: 0, transform: `translateX(-${distance}px)` };
      case "fade":
        return { opacity: 0 };
      default:
        return { opacity: 0 };
    }
  };

  const getAnimatedStyles = () => {
    return { opacity: 1, transform: "translate(0, 0)" };
  };

  return (
    <div
      ref={ref}
      className={cn("transition-all", className)}
      style={{
        ...getInitialStyles(),
        ...(isVisible ? getAnimatedStyles() : {}),
        transitionProperty: "transform, opacity",
        transitionDuration: `${duration}ms`,
        transitionTimingFunction: "cubic-bezier(0.4, 0, 0.2, 1)",
        transitionDelay: `${delay}ms`,
      }}
      {...props}
    >
      {children}
    </div>
  );
}
