import React, { useState, useEffect } from "react";
import { Link, useLocation } from "react-router-dom";
import {
  Menu,
  X,
  ChevronDown,
  Calendar,
  MapPin,
  Dumbbell,
  Users,
  Info,
  Home,
} from "lucide-react";
import { Button } from "./ui/button";
import { ModeToggle } from "./ui/mode-toggle";
import { Badge } from "./ui/badge";
import {
  DropdownMenu,
  DropdownMenuContent,
  DropdownMenuItem,
  DropdownMenuTrigger,
} from "./ui/dropdown-menu";

interface HeaderProps {
  transparent?: boolean;
}

const Header = ({ transparent = false }: HeaderProps) => {
  const [isMenuOpen, setIsMenuOpen] = useState(false);
  const [isScrolled, setIsScrolled] = useState(false);
  const location = useLocation();

  // Handle scroll effect
  useEffect(() => {
    const handleScroll = () => {
      setIsScrolled(window.scrollY > 10);
    };

    window.addEventListener("scroll", handleScroll);
    return () => window.removeEventListener("scroll", handleScroll);
  }, []);

  const toggleMenu = () => {
    setIsMenuOpen(!isMenuOpen);
  };

  const menuItems = [
    { name: "Accueil", path: "/", icon: <Home className="h-4 w-4 mr-2" /> },
    {
      name: "Plannings",
      path: "/planning",
      icon: <Calendar className="h-4 w-4 mr-2" />,
    },
    {
      name: "Clubs",
      path: "/locations",
      icon: <MapPin className="h-4 w-4 mr-2" />,
    },
    {
      name: "Activités",
      path: "/classes",
      icon: <Dumbbell className="h-4 w-4 mr-2" />,
    },
    {
      name: "Coachs",
      path: "/trainers",
      icon: <Users className="h-4 w-4 mr-2" />,
    },
    {
      name: "Abonnements",
      path: "/memberships",
      icon: <Badge className="h-4 w-4 mr-2" />,
    },
    {
      name: "À Propos",
      path: "/about",
      icon: <Info className="h-4 w-4 mr-2" />,
    },
  ];

  const headerClass =
    transparent && !isScrolled
      ? "bg-transparent"
      : "bg-background/95 backdrop-blur-sm border-b shadow-sm dark:border-gray-800";

  return (
    <header
      className={`w-full fixed top-0 left-0 z-50 transition-all duration-300 ${headerClass}`}
    >
      <div className="container mx-auto px-4 h-20 flex items-center justify-between">
        {/* Logo */}
        <Link to="/" className="flex items-center">
          <div className="font-bold text-2xl flex items-center">
            <span className="text-orange-500 font-extrabold">CITY</span>
            <span className="text-teal-500 font-extrabold">CLUB</span>
            <span className="text-orange-400 text-xs ml-0.5 mt-0.5 font-black">
              +
            </span>
          </div>
        </Link>

        {/* Desktop Navigation */}
        <nav className="hidden lg:flex items-center space-x-1">
          {menuItems.map((item) => (
            <Link
              key={item.path}
              to={item.path}
              className={`px-3 py-2 rounded-md flex items-center ${
                location.pathname === item.path
                  ? "text-orange-500 bg-orange-50 dark:bg-orange-950/30 font-semibold"
                  : "text-foreground hover:text-orange-500 hover:bg-orange-50 dark:hover:bg-orange-950/30 font-medium"
              } transition-colors`}
            >
              {item.icon}
              {item.name}
            </Link>
          ))}
        </nav>

        {/* Right Side Actions */}
        <div className="flex items-center gap-3">
          <div className="hidden md:block">
            <ModeToggle />
          </div>

          {/* CTA Button */}
          <div className="hidden md:block">
            <Button
              size="lg"
              className="font-bold bg-orange-500 hover:bg-orange-600 text-white relative overflow-hidden group transition-all duration-300 hover:shadow-lg hover:shadow-orange-500/30 hover:scale-105 btn-primary"
            >
              <span className="relative z-10">INSCRIVEZ-VOUS</span>
              <span className="absolute inset-0 bg-gradient-to-r from-orange-600 to-orange-400 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
            </Button>
          </div>

          {/* Mobile Menu Button */}
          <button
            className="lg:hidden text-foreground hover:text-orange-500 p-2 rounded-md hover:bg-orange-50 dark:hover:bg-orange-950/30"
            onClick={toggleMenu}
            aria-label="Toggle menu"
          >
            {isMenuOpen ? <X size={24} /> : <Menu size={24} />}
          </button>
        </div>
      </div>

      {/* Mobile Menu */}
      {isMenuOpen && (
        <div className="lg:hidden absolute top-20 left-0 right-0 bg-background border-b border-gray-200 dark:border-gray-800 shadow-lg py-4 px-4 z-50">
          <nav className="flex flex-col space-y-2">
            {menuItems.map((item) => (
              <Link
                key={item.path}
                to={item.path}
                className={`px-4 py-3 rounded-md flex items-center ${
                  location.pathname === item.path
                    ? "text-orange-500 bg-orange-50 dark:bg-orange-950/30 font-semibold"
                    : "text-foreground hover:text-orange-500 hover:bg-orange-50 dark:hover:bg-orange-950/30 font-medium"
                } transition-colors`}
                onClick={() => setIsMenuOpen(false)}
              >
                {item.icon}
                {item.name}
              </Link>
            ))}
            <div className="pt-4 flex items-center justify-between">
              <ModeToggle />
              <Button
                size="lg"
                className="font-bold bg-orange-500 hover:bg-orange-600 text-white relative overflow-hidden group transition-all duration-300 hover:shadow-lg hover:shadow-orange-500/30 btn-primary"
              >
                <span className="relative z-10">INSCRIVEZ-VOUS</span>
                <span className="absolute inset-0 bg-gradient-to-r from-orange-600 to-orange-400 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
              </Button>
            </div>
          </nav>
        </div>
      )}

      {/* Location Dropdown - Only visible on desktop */}
      <div
        className={`hidden lg:block w-full py-2 ${transparent && !isScrolled ? "bg-black/30 backdrop-blur-sm text-white" : "bg-muted/50 text-foreground border-b dark:border-gray-800"}`}
      >
        <div className="container mx-auto px-4 flex justify-between items-center">
          <div className="flex items-center">
            <span className="text-sm font-medium mr-2">Trouver un Club:</span>
            <DropdownMenu>
              <DropdownMenuTrigger asChild>
                <Button variant="ghost" size="sm" className="flex items-center">
                  <span>Choisir un Club</span>
                  <ChevronDown className="ml-1 h-4 w-4" />
                </Button>
              </DropdownMenuTrigger>
              <DropdownMenuContent align="start" className="w-56">
                <DropdownMenuItem>Casablanca Downtown</DropdownMenuItem>
                <DropdownMenuItem>Marrakech Plaza</DropdownMenuItem>
                <DropdownMenuItem>Rabat Central</DropdownMenuItem>
                <DropdownMenuItem>Tangier Bay</DropdownMenuItem>
                <DropdownMenuItem>Agadir Beach</DropdownMenuItem>
                <DropdownMenuItem>View All Locations</DropdownMenuItem>
              </DropdownMenuContent>
            </DropdownMenu>
          </div>
          <div className="text-sm">
            <span className="font-medium">Horaires:</span> Lun-Ven 6h-22h |
            Sam-Dim 8h-20h
          </div>
        </div>
      </div>
    </header>
  );
};

export default Header;
