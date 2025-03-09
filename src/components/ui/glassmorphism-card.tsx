import * as React from "react";
import { cn } from "@/lib/utils";

interface GlassmorphismCardProps extends React.HTMLAttributes<HTMLDivElement> {
  blur?: string;
  opacity?: string;
  border?: boolean;
  glow?: boolean;
  glowColor?: string;
}

const GlassmorphismCard = React.forwardRef<
  HTMLDivElement,
  GlassmorphismCardProps
>(
  (
    {
      className,
      blur = "backdrop-blur-md",
      opacity = "bg-white/30",
      border = true,
      glow = false,
      glowColor = "from-orange-500/20 to-teal-500/20",
      children,
      ...props
    },
    ref,
  ) => {
    return (
      <div
        className={cn(
          "rounded-xl",
          blur,
          opacity,
          border && "border border-white/20",
          glow &&
            `relative before:absolute before:-inset-1 before:rounded-xl before:bg-gradient-to-r before:${glowColor} before:opacity-0 before:blur-xl before:transition-opacity before:duration-500 hover:before:opacity-100 before:-z-10`,
          className,
        )}
        ref={ref}
        {...props}
      >
        {children}
      </div>
    );
  },
);

GlassmorphismCard.displayName = "GlassmorphismCard";

export { GlassmorphismCard };
