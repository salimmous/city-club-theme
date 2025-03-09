import React, { useState } from "react";
import { Card, CardContent, CardFooter } from "./ui/card";
import { Button } from "./ui/button";
import { Badge } from "./ui/badge";
import { Search, Filter } from "lucide-react";
import { Input } from "./ui/input";
import {
  Select,
  SelectContent,
  SelectItem,
  SelectTrigger,
  SelectValue,
} from "./ui/select";

interface Trainer {
  id: string;
  name: string;
  specialty: string[];
  location: string;
  image: string;
  experience: string;
  rating: number;
}

interface TrainerGridProps {
  trainers?: Trainer[];
  onViewProfile?: (trainerId: string) => void;
  onFilterChange?: (filters: { specialty: string; location: string }) => void;
}

const TrainerGrid = ({
  trainers = [
    {
      id: "1",
      name: "Ahmed Benali",
      specialty: ["Strength Training", "Bodybuilding"],
      location: "Casablanca",
      image: "https://api.dicebear.com/7.x/avataaars/svg?seed=trainer1",
      experience: "8 years",
      rating: 4.8,
    },
    {
      id: "2",
      name: "Leila Mansouri",
      specialty: ["Yoga", "Pilates"],
      location: "Rabat",
      image: "https://api.dicebear.com/7.x/avataaars/svg?seed=trainer2",
      experience: "6 years",
      rating: 4.7,
    },
    {
      id: "3",
      name: "Karim Tazi",
      specialty: ["CrossFit", "HIIT"],
      location: "Marrakech",
      image: "https://api.dicebear.com/7.x/avataaars/svg?seed=trainer3",
      experience: "5 years",
      rating: 4.9,
    },
    {
      id: "4",
      name: "Nadia El Fassi",
      specialty: ["Nutrition", "Weight Loss"],
      location: "Tangier",
      image: "https://api.dicebear.com/7.x/avataaars/svg?seed=trainer4",
      experience: "7 years",
      rating: 4.6,
    },
    {
      id: "5",
      name: "Omar Benjelloun",
      specialty: ["Boxing", "Martial Arts"],
      location: "Casablanca",
      image: "https://api.dicebear.com/7.x/avataaars/svg?seed=trainer5",
      experience: "10 years",
      rating: 4.9,
    },
    {
      id: "6",
      name: "Samira Alaoui",
      specialty: ["Dance Fitness", "Zumba"],
      location: "Fes",
      image: "https://api.dicebear.com/7.x/avataaars/svg?seed=trainer6",
      experience: "4 years",
      rating: 4.5,
    },
  ],
  onViewProfile = (id) => console.log(`View profile for trainer ${id}`),
  onFilterChange = (filters) => console.log("Filters changed:", filters),
}: TrainerGridProps) => {
  const [searchTerm, setSearchTerm] = useState("");
  const [filters, setFilters] = useState({ specialty: "", location: "" });

  const specialties = [
    "All Specialties",
    "Strength Training",
    "Yoga",
    "Pilates",
    "CrossFit",
    "HIIT",
    "Nutrition",
    "Weight Loss",
    "Boxing",
    "Martial Arts",
    "Dance Fitness",
    "Zumba",
    "Bodybuilding",
  ];

  const locations = [
    "All Locations",
    "Casablanca",
    "Rabat",
    "Marrakech",
    "Tangier",
    "Fes",
    "Agadir",
    "Meknes",
  ];

  const handleFilterChange = (key: "specialty" | "location", value: string) => {
    const newFilters = {
      ...filters,
      [key]:
        value === `All ${key === "specialty" ? "Specialties" : "Locations"}`
          ? ""
          : value,
    };
    setFilters(newFilters);
    onFilterChange(newFilters);
  };

  const filteredTrainers = trainers.filter((trainer) => {
    const matchesSearch = trainer.name
      .toLowerCase()
      .includes(searchTerm.toLowerCase());
    const matchesSpecialty =
      !filters.specialty || trainer.specialty.includes(filters.specialty);
    const matchesLocation =
      !filters.location || trainer.location === filters.location;

    return matchesSearch && matchesSpecialty && matchesLocation;
  });

  return (
    <div className="bg-white w-full p-8 rounded-xl shadow-lg">
      <div className="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
        <div className="relative w-full md:w-64">
          <Input
            placeholder="Rechercher des coachs..."
            value={searchTerm}
            onChange={(e) => setSearchTerm(e.target.value)}
            className="pl-10 border-orange-200 focus:ring-orange-500 focus-visible:ring-orange-500"
          />
          <Search className="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 h-4 w-4" />
        </div>

        <div className="flex flex-col sm:flex-row gap-4 w-full md:w-auto">
          <div className="flex items-center gap-2">
            <Filter className="h-4 w-4 text-gray-500" />
            <Select
              value={filters.specialty || "All Specialties"}
              onValueChange={(value) => handleFilterChange("specialty", value)}
            >
              <SelectTrigger className="w-full sm:w-[180px] border-orange-200 focus:ring-orange-500">
                <SelectValue placeholder="All Specialties" />
              </SelectTrigger>
              <SelectContent>
                {specialties.map((specialty) => (
                  <SelectItem key={specialty} value={specialty}>
                    {specialty}
                  </SelectItem>
                ))}
              </SelectContent>
            </Select>
          </div>

          <div className="flex items-center gap-2">
            <Filter className="h-4 w-4 text-gray-500" />
            <Select
              value={filters.location || "All Locations"}
              onValueChange={(value) => handleFilterChange("location", value)}
            >
              <SelectTrigger className="w-full sm:w-[180px] border-orange-200 focus:ring-orange-500">
                <SelectValue placeholder="All Locations" />
              </SelectTrigger>
              <SelectContent>
                {locations.map((location) => (
                  <SelectItem key={location} value={location}>
                    {location}
                  </SelectItem>
                ))}
              </SelectContent>
            </Select>
          </div>
        </div>
      </div>

      <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        {filteredTrainers.length > 0 ? (
          filteredTrainers.map((trainer) => (
            <Card
              key={trainer.id}
              className="overflow-hidden transition-all hover:shadow-xl hover:-translate-y-2 group"
            >
              <div className="aspect-square relative overflow-hidden bg-gray-100 group-hover:scale-105 transition-transform duration-500">
                <img
                  src={trainer.image}
                  alt={trainer.name}
                  className="object-cover w-full h-full"
                />
              </div>
              <CardContent className="p-6">
                <h3 className="text-xl font-bold mb-1">{trainer.name}</h3>
                <div className="flex items-center mb-3">
                  <span className="text-yellow-500 mr-1">★</span>
                  <span className="text-sm font-medium">{trainer.rating}</span>
                  <span className="mx-2 text-gray-300">|</span>
                  <span className="text-sm text-gray-600">
                    {trainer.experience}
                  </span>
                </div>
                <div className="mb-4">
                  <p className="text-sm text-gray-500 mb-1">
                    Location: {trainer.location}
                  </p>
                  <div className="flex flex-wrap gap-2 mt-2">
                    {trainer.specialty.map((spec) => (
                      <Badge key={spec} variant="secondary" className="text-xs">
                        {spec}
                      </Badge>
                    ))}
                  </div>
                </div>
              </CardContent>
              <CardFooter className="p-6 pt-0">
                <Button
                  className="w-full bg-gradient-to-r from-orange-500 to-orange-600 text-white font-bold group-hover:shadow-lg transition-all duration-300"
                  onClick={() => onViewProfile(trainer.id)}
                >
                  Voir le Profil
                </Button>
              </CardFooter>
            </Card>
          ))
        ) : (
          <div className="col-span-full text-center py-12">
            <p className="text-gray-500">
              No trainers found matching your criteria.
            </p>
          </div>
        )}
      </div>
    </div>
  );
};

export default TrainerGrid;
