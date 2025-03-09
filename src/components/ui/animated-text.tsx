import React, { useEffect, useState } from "react";
import { cn } from "@/lib/utils";

interface AnimatedTextProps {
  text: string;
  className?: string;
  delay?: number;
  speed?: number;
  highlightColor?: string;
  variant?: "typing" | "fade" | "slide" | "bounce" | "highlight";
}

export function AnimatedText({
  text,
  className,
  delay = 0,
  speed = 50,
  highlightColor = "bg-orange-500/20",
  variant = "typing",
}: AnimatedTextProps) {
  const [displayText, setDisplayText] = useState("");
  const [currentIndex, setCurrentIndex] = useState(0);
  const [isVisible, setIsVisible] = useState(false);

  useEffect(() => {
    const timer = setTimeout(() => {
      setIsVisible(true);
    }, delay);

    return () => clearTimeout(timer);
  }, [delay]);

  useEffect(() => {
    if (!isVisible || variant !== "typing") return;

    if (currentIndex < text.length) {
      const timeout = setTimeout(() => {
        setDisplayText((prev) => prev + text[currentIndex]);
        setCurrentIndex((prev) => prev + 1);
      }, speed);

      return () => clearTimeout(timeout);
    }
  }, [currentIndex, isVisible, speed, text, variant]);

  if (!isVisible) return null;

  if (variant === "typing") {
    return (
      <span className={className}>
        {displayText}
        <span className="inline-block w-1 h-5 bg-orange-500 animate-pulse ml-0.5"></span>
      </span>
    );
  }

  if (variant === "fade") {
    return (
      <span
        className={cn(
          "opacity-0 transition-opacity duration-1000",
          isVisible && "opacity-100",
          className,
        )}
      >
        {text}
      </span>
    );
  }

  if (variant === "slide") {
    return (
      <span
        className={cn(
          "inline-block translate-y-4 opacity-0 transition-all duration-700",
          isVisible && "translate-y-0 opacity-100",
          className,
        )}
      >
        {text}
      </span>
    );
  }

  if (variant === "bounce") {
    return (
      <span className={className}>
        {text.split("").map((char, index) => (
          <span
            key={index}
            className="inline-block animate-bounce-slow"
            style={{ animationDelay: `${index * 0.1}s` }}
          >
            {char === " " ? "\u00A0" : char}
          </span>
        ))}
      </span>
    );
  }

  if (variant === "highlight") {
    return (
      <span className={cn("relative inline-block", className)}>
        <span className="relative z-10">{text}</span>
        <span
          className={cn(
            "absolute bottom-1 left-0 w-0 h-3 transition-all duration-700",
            highlightColor,
            isVisible && "w-full",
            "-z-10",
          )}
        ></span>
      </span>
    );
  }

  return <span className={className}>{text}</span>;
}
