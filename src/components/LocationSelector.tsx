import React, { useState } from "react";
import { MapPin } from "lucide-react";
import {
  Select,
  SelectContent,
  SelectGroup,
  SelectItem,
  SelectTrigger,
  SelectValue,
} from "./ui/select";
import { Button } from "./ui/button";

interface Location {
  id: string;
  name: string;
  city: string;
  address: string;
}

interface LocationSelectorProps {
  onLocationChange?: (locationId: string) => void;
  selectedLocation?: string;
  className?: string;
  locations?: Location[];
}

const LocationSelector = ({
  onLocationChange = () => {},
  selectedLocation = "",
  className = "",
  locations = [
    {
      id: "loc1",
      name: "CityClub Casablanca Central",
      city: "Casablanca",
      address: "123 Mohammed V Boulevard",
    },
    {
      id: "loc2",
      name: "CityClub Marrakech Medina",
      city: "Marrakech",
      address: "45 Jemaa el-Fnaa Square",
    },
    {
      id: "loc3",
      name: "CityClub Rabat Agdal",
      city: "Rabat",
      address: "78 Hassan II Avenue",
    },
    {
      id: "loc4",
      name: "CityClub Tangier Bay",
      city: "Tangier",
      address: "22 Mediterranean Boulevard",
    },
    {
      id: "loc5",
      name: "CityClub Fes Medina",
      city: "Fes",
      address: "56 Talaa Kebira Street",
    },
  ],
}: LocationSelectorProps) => {
  const [isOpen, setIsOpen] = useState(false);

  const handleLocationChange = (value: string) => {
    onLocationChange(value);
  };

  return (
    <div
      className={`flex flex-col sm:flex-row items-center gap-2 bg-white rounded-lg p-2 shadow-md ${className}`}
    >
      <div className="flex items-center gap-2 text-gray-700 font-medium">
        <MapPin className="h-5 w-5 text-primary" />
        <span>Choisir un Club:</span>
      </div>

      <div className="w-full sm:w-64">
        <Select value={selectedLocation} onValueChange={handleLocationChange}>
          <SelectTrigger className="w-full bg-white border-gray-300 focus:ring-primary">
            <SelectValue placeholder="Choisissez un club" />
          </SelectTrigger>
          <SelectContent>
            <SelectGroup>
              {locations.map((location) => (
                <SelectItem key={location.id} value={location.id}>
                  <div className="flex flex-col">
                    <span className="font-medium">{location.name}</span>
                    <span className="text-xs text-gray-500">
                      {location.city} - {location.address}
                    </span>
                  </div>
                </SelectItem>
              ))}
            </SelectGroup>
          </SelectContent>
        </Select>
      </div>

      <Button
        variant="default"
        size="sm"
        className="bg-primary hover:bg-primary/90 text-white whitespace-nowrap relative overflow-hidden group transition-all duration-300 hover:shadow-lg hover:shadow-orange-500/30"
        onClick={() =>
          window.open(
            `https://maps.google.com/?q=${
              selectedLocation
                ? locations.find((loc) => loc.id === selectedLocation)?.address
                : "Fitness Club Morocco"
            }`,
          )
        }
      >
        <span className="relative z-10">ITINÉRAIRE</span>
        <span className="absolute inset-0 bg-gradient-to-r from-orange-600 to-orange-400 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
      </Button>
    </div>
  );
};

export default LocationSelector;
