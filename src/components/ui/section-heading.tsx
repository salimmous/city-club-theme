import * as React from "react";
import { cn } from "@/lib/utils";

interface SectionHeadingProps extends React.HTMLAttributes<HTMLDivElement> {
  title: string;
  subtitle?: string;
  align?: "left" | "center" | "right";
  titleSize?: "sm" | "md" | "lg" | "xl";
  subtitleSize?: "sm" | "md" | "lg";
  highlight?: boolean;
  decorative?: boolean;
}

const SectionHeading = React.forwardRef<HTMLDivElement, SectionHeadingProps>(
  (
    {
      className,
      title,
      subtitle,
      align = "center",
      titleSize = "lg",
      subtitleSize = "md",
      highlight = true,
      decorative = true,
      ...props
    },
    ref,
  ) => {
    const alignClasses = {
      left: "text-left",
      center: "text-center",
      right: "text-right",
    };

    const titleSizeClasses = {
      sm: "text-2xl md:text-3xl",
      md: "text-3xl md:text-4xl",
      lg: "text-4xl md:text-5xl",
      xl: "text-5xl md:text-6xl",
    };

    const subtitleSizeClasses = {
      sm: "text-base",
      md: "text-lg",
      lg: "text-xl",
    };

    return (
      <div
        ref={ref}
        className={cn("mb-12", alignClasses[align], className)}
        {...props}
      >
        {decorative && (
          <div className="flex items-center justify-center mb-4">
            <div className="h-1 w-12 bg-orange-500 rounded-full"></div>
            <div className="h-1 w-1 bg-orange-500 rounded-full mx-1"></div>
            <div className="h-1 w-1 bg-orange-500 rounded-full"></div>
          </div>
        )}

        <h2
          className={cn(
            "font-bold tracking-tight text-gray-900",
            titleSizeClasses[titleSize],
          )}
        >
          {highlight ? (
            <>
              {title.split(" ").map((word, i) => (
                <React.Fragment key={i}>
                  {i > 0 && " "}
                  {i === 0 || i === title.split(" ").length - 1 ? (
                    <span className="relative inline-block">
                      <span className="relative z-10">{word}</span>
                      <span className="absolute bottom-2 left-0 w-full h-3 bg-orange-500/20 -z-10"></span>
                    </span>
                  ) : (
                    word
                  )}
                </React.Fragment>
              ))}
            </>
          ) : (
            title
          )}
        </h2>

        {subtitle && (
          <p
            className={cn(
              "mt-4 text-gray-600 max-w-3xl mx-auto",
              subtitleSizeClasses[subtitleSize],
            )}
          >
            {subtitle}
          </p>
        )}
      </div>
    );
  },
);

SectionHeading.displayName = "SectionHeading";

export { SectionHeading };
