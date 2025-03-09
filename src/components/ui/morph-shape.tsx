import React from "react";
import { cn } from "@/lib/utils";

interface MorphShapeProps extends React.HTMLAttributes<HTMLDivElement> {
  color?: string;
  size?: string;
  animate?: boolean;
  duration?: number;
  blur?: string;
  opacity?: string;
}

export function MorphShape({
  color = "bg-orange-500",
  size = "w-64 h-64",
  animate = true,
  duration = 8,
  blur = "",
  opacity = "opacity-70",
  className,
  children,
  ...props
}: MorphShapeProps) {
  return (
    <div
      className={cn(
        "relative",
        size,
        color,
        blur,
        opacity,
        animate && "animate-morph",
        className,
      )}
      style={{
        borderRadius: "60% 40% 30% 70%/60% 30% 70% 40%",
        animationDuration: `${duration}s`,
      }}
      {...props}
    >
      {children}
    </div>
  );
}
