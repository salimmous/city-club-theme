import * as React from "react";
import { cn } from "@/lib/utils";

interface ThreeDCardProps extends React.HTMLAttributes<HTMLDivElement> {
  depth?: string;
  shadow?: string;
  rotateX?: number;
  rotateY?: number;
}

const ThreeDCard = React.forwardRef<HTMLDivElement, ThreeDCardProps>(
  (
    {
      className,
      depth = "transform-gpu",
      shadow = "shadow-xl",
      rotateX = 10,
      rotateY = 10,
      children,
      ...props
    },
    ref,
  ) => {
    const cardRef = React.useRef<HTMLDivElement>(null);
    const [rotation, setRotation] = React.useState({ x: 0, y: 0 });
    const [isHovering, setIsHovering] = React.useState(false);

    const handleMouseMove = (e: React.MouseEvent<HTMLDivElement>) => {
      if (!cardRef.current) return;

      const rect = cardRef.current.getBoundingClientRect();
      const x = e.clientX - rect.left;
      const y = e.clientY - rect.top;

      const centerX = rect.width / 2;
      const centerY = rect.height / 2;

      const rotateY = ((x - centerX) / centerX) * rotateX;
      const rotateX = ((centerY - y) / centerY) * rotateY;

      setRotation({ x: rotateX, y: rotateY });
    };

    const handleMouseEnter = () => {
      setIsHovering(true);
    };

    const handleMouseLeave = () => {
      setIsHovering(false);
      setRotation({ x: 0, y: 0 });
    };

    return (
      <div
        ref={cardRef}
        className={cn(
          "rounded-xl overflow-hidden transition-all duration-200",
          depth,
          shadow,
          className,
        )}
        style={{
          transform: isHovering
            ? `perspective(1000px) rotateX(${rotation.x}deg) rotateY(${rotation.y}deg)`
            : "perspective(1000px) rotateX(0) rotateY(0)",
          transition: "transform 0.2s ease-out",
        }}
        onMouseMove={handleMouseMove}
        onMouseEnter={handleMouseEnter}
        onMouseLeave={handleMouseLeave}
        {...props}
        ref={ref}
      >
        {children}
      </div>
    );
  },
);

ThreeDCard.displayName = "ThreeDCard";

export { ThreeDCard };
