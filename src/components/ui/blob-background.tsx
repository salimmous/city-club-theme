import React from "react";
import { cn } from "@/lib/utils";

interface BlobBackgroundProps extends React.HTMLAttributes<HTMLDivElement> {
  blobColors?: string[];
  blobCount?: number;
  animate?: boolean;
  blur?: string;
  opacity?: string;
}

export function BlobBackground({
  blobColors = ["bg-orange-500", "bg-teal-500", "bg-pink-500"],
  blobCount = 3,
  animate = true,
  blur = "blur-3xl",
  opacity = "opacity-20",
  className,
  children,
  ...props
}: BlobBackgroundProps) {
  // Generate random positions for blobs
  const blobs = Array.from({ length: blobCount }, (_, i) => {
    const top = Math.floor(Math.random() * 100);
    const left = Math.floor(Math.random() * 100);
    const size = Math.floor(Math.random() * 300) + 200; // Between 200px and 500px
    const colorIndex = i % blobColors.length;

    return { top, left, size, color: blobColors[colorIndex] };
  });

  return (
    <div className={cn("relative overflow-hidden", className)} {...props}>
      {/* Blobs */}
      {blobs.map((blob, index) => (
        <div
          key={index}
          className={cn(
            "absolute rounded-full",
            blob.color,
            blur,
            opacity,
            animate && "animate-blob",
          )}
          style={{
            top: `${blob.top}%`,
            left: `${blob.left}%`,
            width: `${blob.size}px`,
            height: `${blob.size}px`,
            animationDelay: `${index * 0.5}s`,
            animationDuration: `${15 + index * 2}s`,
          }}
        />
      ))}

      {/* Content */}
      <div className="relative z-10">{children}</div>
    </div>
  );
}
