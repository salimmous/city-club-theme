import React, { useRef, useState } from "react";
import { cn } from "@/lib/utils";

interface MagneticButtonProps
  extends React.ButtonHTMLAttributes<HTMLButtonElement> {
  strength?: number;
  radius?: number;
  children: React.ReactNode;
}

export function MagneticButton({
  strength = 30,
  radius = 400,
  children,
  className,
  ...props
}: MagneticButtonProps) {
  const buttonRef = useRef<HTMLButtonElement>(null);
  const [position, setPosition] = useState({ x: 0, y: 0 });

  const handleMouseMove = (e: React.MouseEvent<HTMLButtonElement>) => {
    if (!buttonRef.current) return;

    const { clientX, clientY } = e;
    const { left, top, width, height } =
      buttonRef.current.getBoundingClientRect();

    const centerX = left + width / 2;
    const centerY = top + height / 2;

    const distance = Math.sqrt(
      Math.pow(clientX - centerX, 2) + Math.pow(clientY - centerY, 2),
    );

    if (distance < radius) {
      // Calculate the magnetic pull based on distance
      const pull = 1 - Math.min(distance / radius, 1);

      // Calculate the new position
      const moveX = (clientX - centerX) * pull * (strength / 10);
      const moveY = (clientY - centerY) * pull * (strength / 10);

      setPosition({ x: moveX, y: moveY });
    } else {
      setPosition({ x: 0, y: 0 });
    }
  };

  const handleMouseLeave = () => {
    setPosition({ x: 0, y: 0 });
  };

  return (
    <button
      ref={buttonRef}
      className={cn(
        "relative inline-flex items-center justify-center transition-transform duration-200",
        className,
      )}
      style={{
        transform: `translate(${position.x}px, ${position.y}px)`,
      }}
      onMouseMove={handleMouseMove}
      onMouseLeave={handleMouseLeave}
      {...props}
    >
      {children}
    </button>
  );
}
