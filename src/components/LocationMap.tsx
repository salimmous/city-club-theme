import React, { useState } from "react";
import { Card } from "./ui/card";
import { Button } from "./ui/button";
import { MapPin, Navigation, Phone, Clock, Info } from "lucide-react";

interface LocationInfo {
  id: string;
  name: string;
  address: string;
  city: string;
  phone: string;
  hours: string;
  coordinates: [number, number];
  amenities: string[];
}

interface LocationMapProps {
  locations?: LocationInfo[];
  selectedLocationId?: string;
  onLocationSelect?: (locationId: string) => void;
}

const LocationMap = ({
  locations = [
    {
      id: "loc1",
      name: "Fitness Club Casablanca Central",
      address: "123 Mohammed V Boulevard",
      city: "Casablanca",
      phone: "+212-522-123456",
      hours: "Mon-Fri: 6am-10pm, Sat-Sun: 8am-8pm",
      coordinates: [33.5731, -7.5898],
      amenities: [
        "Pool",
        "Sauna",
        "Group Classes",
        "Personal Training",
        "Parking",
      ],
    },
    {
      id: "loc2",
      name: "Fitness Club Marrakech",
      address: "45 Avenue Hassan II",
      city: "Marrakech",
      phone: "+212-524-789012",
      hours: "Mon-Fri: 6am-10pm, Sat-Sun: 8am-8pm",
      coordinates: [31.6295, -7.9811],
      amenities: ["Group Classes", "Personal Training", "Spa", "Juice Bar"],
    },
    {
      id: "loc3",
      name: "Fitness Club Rabat",
      address: "78 Avenue Mohammed VI",
      city: "Rabat",
      phone: "+212-537-345678",
      hours: "Mon-Fri: 6am-10pm, Sat-Sun: 8am-8pm",
      coordinates: [34.0209, -6.8416],
      amenities: ["Pool", "Group Classes", "Personal Training", "Childcare"],
    },
    {
      id: "loc4",
      name: "Fitness Club Tangier",
      address: "12 Boulevard Pasteur",
      city: "Tangier",
      phone: "+212-539-567890",
      hours: "Mon-Fri: 6am-10pm, Sat-Sun: 8am-8pm",
      coordinates: [35.7673, -5.7998],
      amenities: ["Group Classes", "Personal Training", "Nutrition Counseling"],
    },
    {
      id: "loc5",
      name: "Fitness Club Agadir",
      address: "34 Avenue Hassan I",
      city: "Agadir",
      phone: "+212-528-901234",
      hours: "Mon-Fri: 6am-10pm, Sat-Sun: 8am-8pm",
      coordinates: [30.4278, -9.5981],
      amenities: ["Pool", "Beach Access", "Group Classes", "Personal Training"],
    },
  ],
  selectedLocationId = "loc1",
  onLocationSelect = () => {},
}: LocationMapProps) => {
  const [activeLocation, setActiveLocation] =
    useState<string>(selectedLocationId);

  // Find the currently selected location
  const selectedLocation =
    locations.find((loc) => loc.id === activeLocation) || locations[0];

  const handleLocationClick = (locationId: string) => {
    setActiveLocation(locationId);
    onLocationSelect(locationId);
  };

  return (
    <div className="w-full h-full bg-white rounded-xl shadow-xl overflow-hidden">
      <div className="flex flex-col md:flex-row h-full">
        {/* Map Visualization - In a real implementation, this would use a mapping library like Google Maps or Leaflet */}
        <div className="w-full md:w-2/3 h-64 md:h-full bg-gray-200 relative">
          {/* Placeholder for the actual map */}
          <div
            className="w-full h-full bg-cover bg-center"
            style={{
              backgroundImage:
                "url('https://images.unsplash.com/photo-1569336415962-a4bd9f69c07a?w=1200&q=80')",
            }}
          >
            {/* Location markers - would be positioned properly with actual map coordinates */}
            {locations.map((location) => (
              <div
                key={location.id}
                className={`absolute cursor-pointer transform -translate-x-1/2 -translate-y-1/2 ${activeLocation === location.id ? "z-10" : "z-0"}`}
                style={{
                  // These positions are just for demonstration - would use actual map projection in real implementation
                  left: `${(Math.abs(location.coordinates[1]) % 10) * 10}%`,
                  top: `${(Math.abs(location.coordinates[0]) % 10) * 10}%`,
                }}
                onClick={() => handleLocationClick(location.id)}
              >
                <div
                  className={`p-1 rounded-full ${activeLocation === location.id ? "bg-primary text-white" : "bg-white text-primary"}`}
                >
                  <MapPin size={activeLocation === location.id ? 24 : 20} />
                </div>
              </div>
            ))}
          </div>
        </div>

        {/* Location Details Panel */}
        <div className="w-full md:w-1/3 p-4 bg-white overflow-y-auto">
          <h3 className="text-xl font-bold mb-4 flex items-center">
            <MapPin className="h-5 w-5 text-orange-500 mr-2" />
            Nos Clubs
          </h3>

          {/* Location List */}
          <div className="space-y-2 mb-6">
            {locations.map((location) => (
              <Button
                key={location.id}
                variant={activeLocation === location.id ? "default" : "outline"}
                className="w-full justify-start text-left hover:bg-orange-50 transition-colors duration-300"
                onClick={() => handleLocationClick(location.id)}
              >
                <MapPin className="mr-2 h-4 w-4" />
                {location.city}
              </Button>
            ))}
          </div>

          {/* Selected Location Details */}
          {selectedLocation && (
            <Card className="p-6 shadow-lg border-orange-100">
              <h4 className="text-lg font-bold">{selectedLocation.name}</h4>
              <p className="text-sm text-gray-600 mb-4">
                {selectedLocation.address}, {selectedLocation.city}
              </p>

              <div className="space-y-3">
                <div className="flex items-center">
                  <Phone className="h-4 w-4 mr-2 text-primary" />
                  <span className="text-sm">{selectedLocation.phone}</span>
                </div>

                <div className="flex items-center">
                  <Clock className="h-4 w-4 mr-2 text-primary" />
                  <span className="text-sm">{selectedLocation.hours}</span>
                </div>

                <div className="mt-4">
                  <h5 className="text-sm font-semibold flex items-center mb-2">
                    <Info className="h-4 w-4 mr-2 text-primary" />
                    Amenities
                  </h5>
                  <ul className="text-sm grid grid-cols-2 gap-1">
                    {selectedLocation.amenities.map((amenity, index) => (
                      <li key={index} className="flex items-center">
                        <div className="h-1.5 w-1.5 rounded-full bg-primary mr-2"></div>
                        {amenity}
                      </li>
                    ))}
                  </ul>
                </div>

                <Button className="w-full mt-4 bg-gradient-to-r from-orange-500 to-orange-600 text-white hover:shadow-lg transition-all duration-300 hover:scale-105">
                  <Navigation className="mr-2 h-4 w-4" />
                  Itinéraire
                </Button>
              </div>
            </Card>
          )}
        </div>
      </div>
    </div>
  );
};

export default LocationMap;
