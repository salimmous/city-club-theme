import React, { useEffect, useRef, useState } from "react";
import { cn } from "@/lib/utils";

interface TextRevealProps extends React.HTMLAttributes<HTMLDivElement> {
  text: string;
  revealText?: string;
  as?: React.ElementType;
  revealDirection?: "up" | "down" | "left" | "right";
  revealDelay?: number;
  revealDuration?: number;
  wordByWord?: boolean;
  wordDelay?: number;
}

export function TextReveal({
  text,
  revealText = text,
  as: Component = "h2",
  revealDirection = "up",
  revealDelay = 0,
  revealDuration = 800,
  wordByWord = false,
  wordDelay = 100,
  className,
  ...props
}: TextRevealProps) {
  const [isVisible, setIsVisible] = useState(false);
  const containerRef = useRef<HTMLDivElement>(null);

  useEffect(() => {
    const observer = new IntersectionObserver(
      ([entry]) => {
        if (entry.isIntersecting) {
          setIsVisible(true);
          observer.disconnect();
        }
      },
      { threshold: 0.1 },
    );

    if (containerRef.current) {
      observer.observe(containerRef.current);
    }

    return () => observer.disconnect();
  }, []);

  // Get transform value based on direction
  const getTransform = () => {
    switch (revealDirection) {
      case "up":
        return "translateY(100%)";
      case "down":
        return "translateY(-100%)";
      case "left":
        return "translateX(100%)";
      case "right":
        return "translateX(-100%)";
      default:
        return "translateY(100%)";
    }
  };

  if (wordByWord) {
    const words = revealText.split(" ");

    return (
      <div
        ref={containerRef}
        className={cn("overflow-hidden", className)}
        {...props}
      >
        <Component className="flex flex-wrap">
          {words.map((word, index) => (
            <span key={index} className="mr-[0.25em] overflow-hidden">
              <span
                className="inline-block animate-text-reveal-words"
                style={{
                  animationDelay: `${revealDelay + index * wordDelay}ms`,
                  animationDuration: `${revealDuration}ms`,
                  opacity: 0,
                }}
              >
                {word}
              </span>
            </span>
          ))}
        </Component>
      </div>
    );
  }

  return (
    <div
      ref={containerRef}
      className={cn("overflow-hidden", className)}
      {...props}
    >
      <Component
        className="inline-block"
        style={{
          transform: isVisible ? "translateY(0)" : getTransform(),
          opacity: isVisible ? 1 : 0,
          transition: `transform ${revealDuration}ms cubic-bezier(0.16, 1, 0.3, 1) ${revealDelay}ms, opacity ${revealDuration}ms ease ${revealDelay}ms`,
        }}
      >
        {revealText}
      </Component>
    </div>
  );
}
