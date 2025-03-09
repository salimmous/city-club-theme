import React, { useState } from "react";
import { Dumbbell, Users } from "lucide-react";
import TrainerGrid from "./TrainerGrid";

interface Trainer {
  id: string;
  name: string;
  specialty: string[];
  location: string;
  image: string;
  experience: string;
  rating: number;
}

interface TrainerSectionProps {
  trainers?: Trainer[];
  selectedLocation?: string;
}

const defaultTrainers: Trainer[] = [
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
];

const TrainerSection: React.FC<TrainerSectionProps> = ({
  trainers = defaultTrainers,
  selectedLocation = "",
}) => {
  const [viewingTrainer, setViewingTrainer] = useState<string | null>(null);

  // Filter trainers by location if a location is selected
  const filteredTrainers = selectedLocation
    ? trainers.filter((trainer) => trainer.location === selectedLocation)
    : trainers;

  const handleViewProfile = (trainerId: string) => {
    setViewingTrainer(trainerId);
    // In a real implementation, this might open a modal or navigate to a profile page
    console.log(`Viewing profile for trainer ${trainerId}`);
  };

  return (
    <section className="py-24 px-4 md:px-8 bg-gray-50">
      <div className="max-w-7xl mx-auto">
        <div className="text-center mb-12">
          <div className="flex items-center justify-center mb-4">
            <div className="h-1 w-12 bg-orange-500 rounded-full"></div>
            <div className="h-1 w-1 bg-orange-500 rounded-full mx-1"></div>
            <div className="h-1 w-1 bg-orange-500 rounded-full"></div>
          </div>
          <h2 className="text-4xl md:text-5xl font-bold text-gray-900 mb-6 tracking-tight">
            <span className="relative inline-block">
              <span className="relative z-10">Nos</span>
              <span className="absolute bottom-2 left-0 w-full h-3 bg-orange-500/20 -z-10"></span>
            </span>{" "}
            Coachs Experts
          </h2>
          <p className="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
            Nos professionnels du fitness certifiés sont dédiés à vous aider à
            atteindre vos objectifs avec des programmes d'entraînement
            personnalisés et des conseils d'experts.
          </p>
        </div>

        <div className="flex items-center justify-between mb-8">
          <div className="flex items-center">
            <Users className="h-5 w-5 text-primary mr-2" />
            <span className="font-medium">
              {filteredTrainers.length} Trainers
              {selectedLocation ? ` in ${selectedLocation}` : " Available"}
            </span>
          </div>
        </div>

        <TrainerGrid
          trainers={filteredTrainers}
          onViewProfile={handleViewProfile}
        />

        <div className="mt-12 text-center">
          <p className="text-gray-600 mb-4">
            Want to join our team of fitness professionals?
          </p>
          <button className="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2">
            Apply to Become a Trainer
          </button>
        </div>
      </div>
    </section>
  );
};

export default TrainerSection;
