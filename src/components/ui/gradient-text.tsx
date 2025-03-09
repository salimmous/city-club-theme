import React from "react";
import { cn } from "@/lib/utils";

interface GradientTextProps extends React.HTMLAttributes<HTMLSpanElement> {
  gradient?: string;
  animate?: boolean;
  animationDuration?: number;
  as?: React.ElementType;
}

export function GradientText({
  gradient = "from-orange-500 via-red-500 to-orange-500",
  animate = false,
  animationDuration = 3,
  as: Component = "span",
  className,
  children,
  ...props
}: GradientTextProps) {
  return (
    <Component
      className={cn(
        "bg-clip-text text-transparent bg-gradient-to-r",
        gradient,
        animate && "animate-gradient-x bg-[length:200%_auto]",
        className,
      )}
      style={
        animate ? { animationDuration: `${animationDuration}s` } : undefined
      }
      {...props}
    >
      {children}
    </Component>
  );
}
