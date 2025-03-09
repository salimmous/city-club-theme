import React, { useState } from "react";
import { MapPin, Navigation, Search } from "lucide-react";
import { Button } from "./ui/button";
import { Input } from "./ui/input";
import LocationMap from "./LocationMap";

interface LocationMapSectionProps {
  title?: string;
  description?: string;
  className?: string;
}

const LocationMapSection = ({
  title = "Find a Club Near You",
  description = "With over 20 locations across Morocco, there's always a Fitness Club nearby. Use the map to find your nearest club and explore its amenities.",
  className = "",
}: LocationMapSectionProps) => {
  const [searchQuery, setSearchQuery] = useState("");
  const [selectedLocation, setSelectedLocation] = useState("loc1");

  const handleSearch = (e: React.FormEvent) => {
    e.preventDefault();
    // In a real implementation, this would filter locations based on search query
    console.log("Searching for:", searchQuery);
  };

  const handleLocationSelect = (locationId: string) => {
    setSelectedLocation(locationId);
  };

  return (
    <section className={`py-24 bg-white ${className}`}>
      <div className="container mx-auto px-4">
        <div className="text-center mb-10">
          <div className="flex items-center justify-center mb-4">
            <div className="h-1 w-12 bg-orange-500 rounded-full"></div>
            <div className="h-1 w-1 bg-orange-500 rounded-full mx-1"></div>
            <div className="h-1 w-1 bg-orange-500 rounded-full"></div>
          </div>
          <h2 className="text-4xl md:text-5xl font-bold text-gray-900 mb-6 tracking-tight">
            <span className="relative inline-block">
              <span className="relative z-10">{title.split(" ")[0]}</span>
              <span className="absolute bottom-2 left-0 w-full h-3 bg-orange-500/20 -z-10"></span>
            </span>{" "}
            {title.split(" ").slice(1).join(" ")}
          </h2>
          <p className="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
            {description}
          </p>
        </div>

        <div className="flex flex-col md:flex-row items-center justify-center gap-4 mb-8">
          <form
            onSubmit={handleSearch}
            className="relative w-full max-w-md flex-shrink-0"
          >
            <Input
              type="text"
              placeholder="Rechercher par ville ou code postal"
              value={searchQuery}
              onChange={(e) => setSearchQuery(e.target.value)}
              className="pl-10 pr-4 py-2 w-full border-orange-200 focus:ring-orange-500 focus-visible:ring-orange-500"
            />
            <Search className="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 h-4 w-4" />
            <Button
              type="submit"
              className="absolute right-1 top-1/2 transform -translate-y-1/2 h-8 px-3 bg-orange-500 hover:bg-orange-600"
              size="sm"
            >
              Rechercher
            </Button>
          </form>

          <div className="flex items-center gap-2">
            <Button
              variant="outline"
              className="flex items-center gap-2"
              onClick={() => {
                // This would use geolocation API in a real implementation
                console.log("Finding nearest location");
              }}
            >
              <Navigation className="h-4 w-4" />
              Trouver le Club le Plus Proche
            </Button>

            <Button
              variant="link"
              className="text-primary"
              onClick={() => {
                window.open(
                  "https://maps.google.com/?q=Fitness+Club+Morocco",
                  "_blank",
                );
              }}
            >
              <MapPin className="h-4 w-4 mr-1" />
              Voir Tous les Clubs
            </Button>
          </div>
        </div>

        <div className="bg-white rounded-xl shadow-xl overflow-hidden h-[600px]">
          <LocationMap
            selectedLocationId={selectedLocation}
            onLocationSelect={handleLocationSelect}
          />
        </div>

        <div className="mt-8 text-center">
          <p className="text-gray-600 mb-4">
            Want to know more about a specific location? Visit in person or call
            us directly.
          </p>
          <Button
            size="lg"
            className="bg-gradient-to-r from-orange-500 to-orange-600 text-white font-bold px-8 py-6 text-lg rounded-xl shadow-lg shadow-orange-500/20 hover:shadow-orange-500/40 transition-all duration-300 hover:scale-105"
          >
            Programmer une Visite
          </Button>
        </div>
      </div>
    </section>
  );
};

export default LocationMapSection;
