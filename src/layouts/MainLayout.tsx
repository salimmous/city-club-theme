import React from "react";
import Header from "@/components/Header";
import { ThemeProvider } from "@/components/ui/theme-provider";

interface MainLayoutProps {
  children: React.ReactNode;
  transparentHeader?: boolean;
}

const MainLayout: React.FC<MainLayoutProps> = ({
  children,
  transparentHeader = false,
}) => {
  return (
    <ThemeProvider defaultTheme="light">
      <div className="flex flex-col min-h-screen bg-background">
        <Header transparent={transparentHeader} />
        <main className="flex-grow">{children}</main>
      </div>
    </ThemeProvider>
  );
};

export default MainLayout;
