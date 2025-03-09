import React, { useEffect, useRef, useState } from "react";
import { cn } from "@/lib/utils";

interface ParallaxSectionProps extends React.HTMLAttributes<HTMLDivElement> {
  backgroundImage?: string;
  overlayColor?: string;
  overlayOpacity?: number;
  speed?: number;
  fullHeight?: boolean;
  children: React.ReactNode;
}

export function ParallaxSection({
  backgroundImage,
  overlayColor = "#000",
  overlayOpacity = 0.5,
  speed = 0.5,
  fullHeight = true,
  children,
  className,
  ...props
}: ParallaxSectionProps) {
  const sectionRef = useRef<HTMLDivElement>(null);
  const [offset, setOffset] = useState(0);

  useEffect(() => {
    const handleScroll = () => {
      if (!sectionRef.current) return;

      const { top, height } = sectionRef.current.getBoundingClientRect();
      const windowHeight = window.innerHeight;

      // Calculate how far the section is from the viewport center
      const sectionCenter = top + height / 2;
      const viewportCenter = windowHeight / 2;
      const distanceFromCenter = sectionCenter - viewportCenter;

      // Calculate parallax offset
      const parallaxOffset = distanceFromCenter * speed;

      setOffset(parallaxOffset);
    };

    window.addEventListener("scroll", handleScroll);
    handleScroll(); // Initial calculation

    return () => window.removeEventListener("scroll", handleScroll);
  }, [speed]);

  return (
    <div
      ref={sectionRef}
      className={cn(
        "relative overflow-hidden",
        fullHeight && "min-h-screen",
        className,
      )}
      {...props}
    >
      {backgroundImage && (
        <div
          className="absolute inset-0 bg-cover bg-center w-full h-full"
          style={{
            backgroundImage: `url(${backgroundImage})`,
            transform: `translateY(${offset}px)`,
          }}
        />
      )}

      {(overlayOpacity > 0 || overlayColor) && (
        <div
          className="absolute inset-0"
          style={{
            backgroundColor: overlayColor,
            opacity: overlayOpacity,
          }}
        />
      )}

      <div className="relative z-10">{children}</div>
    </div>
  );
}
