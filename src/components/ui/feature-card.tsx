import * as React from "react";
import { cn } from "@/lib/utils";

interface FeatureCardProps extends React.HTMLAttributes<HTMLDivElement> {
  icon?: React.ReactNode;
  title: string;
  description: string;
  variant?: "default" | "bordered" | "gradient" | "minimal";
  iconBackground?: string;
  hoverEffect?: boolean;
}

const FeatureCard = React.forwardRef<HTMLDivElement, FeatureCardProps>(
  (
    {
      className,
      icon,
      title,
      description,
      variant = "default",
      iconBackground = "bg-orange-500",
      hoverEffect = true,
      ...props
    },
    ref,
  ) => {
    const variants = {
      default: "bg-white p-6 rounded-xl shadow-md",
      bordered: "bg-white p-6 rounded-xl border border-gray-200",
      gradient:
        "bg-gradient-to-br from-white to-gray-50 p-6 rounded-xl shadow-md",
      minimal: "p-6",
    };

    return (
      <div
        ref={ref}
        className={cn(
          variants[variant],
          hoverEffect &&
            "transition-all duration-300 hover:shadow-xl hover:-translate-y-1",
          className,
        )}
        {...props}
      >
        {icon && (
          <div
            className={cn(
              "w-12 h-12 flex items-center justify-center rounded-lg mb-4",
              iconBackground,
            )}
          >
            {icon}
          </div>
        )}
        <h3 className="text-xl font-bold mb-2">{title}</h3>
        <p className="text-gray-600">{description}</p>
      </div>
    );
  },
);

FeatureCard.displayName = "FeatureCard";

export { FeatureCard };
