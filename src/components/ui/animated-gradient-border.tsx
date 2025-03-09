import * as React from "react";
import { cn } from "@/lib/utils";

interface AnimatedGradientBorderProps
  extends React.HTMLAttributes<HTMLDivElement> {
  borderWidth?: string;
  gradientColors?: string;
  animationDuration?: string;
  containerClassName?: string;
}

const AnimatedGradientBorder = React.forwardRef<
  HTMLDivElement,
  AnimatedGradientBorderProps
>(
  (
    {
      className,
      borderWidth = "border-2",
      gradientColors = "from-orange-500 via-teal-500 to-orange-500",
      animationDuration = "animate-gradient-x",
      containerClassName,
      children,
      ...props
    },
    ref,
  ) => {
    return (
      <div
        className={cn(
          "relative p-[2px] overflow-hidden rounded-xl",
          containerClassName,
        )}
      >
        <div
          className={cn(
            "absolute inset-0 rounded-xl bg-gradient-to-r",
            gradientColors,
            animationDuration,
          )}
        />
        <div
          className={cn(
            "relative bg-white dark:bg-gray-900 rounded-[calc(0.75rem-2px)] h-full",
            className,
          )}
          ref={ref}
          {...props}
        >
          {children}
        </div>
      </div>
    );
  },
);

AnimatedGradientBorder.displayName = "AnimatedGradientBorder";

export { AnimatedGradientBorder };
