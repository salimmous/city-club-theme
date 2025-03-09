import React, { useState } from "react";
import { Dumbbell, Calendar, ArrowRight } from "lucide-react";
import { Button } from "./ui/button";
import ClassScheduleWidget from "./ClassScheduleWidget";
import LocationSelector from "./LocationSelector";

interface ClassScheduleSectionProps {
  title?: string;
  description?: string;
  selectedLocation?: string;
  onLocationChange?: (locationId: string) => void;
  showAllClassesLink?: boolean;
}

const ClassScheduleSection: React.FC<ClassScheduleSectionProps> = ({
  title = "Class Schedules",
  description = "Find the perfect class for your fitness journey. Filter by day, type, or level to discover classes that match your interests and schedule.",
  selectedLocation = "",
  onLocationChange = () => {},
  showAllClassesLink = true,
}) => {
  const [location, setLocation] = useState(selectedLocation);

  const handleLocationChange = (locationId: string) => {
    setLocation(locationId);
    onLocationChange(locationId);
  };

  return (
    <section className="py-24 px-4 md:px-8 bg-white">
      <div className="max-w-7xl mx-auto">
        <div className="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-6">
          <div className="max-w-2xl">
            <div className="inline-block bg-orange-500/10 px-4 py-1 rounded-full mb-4">
              <span className="text-sm font-medium tracking-wider text-orange-600 flex items-center">
                <Dumbbell className="h-4 w-4 mr-2" /> PROGRAMMES VARIÉS
              </span>
            </div>
            <h2 className="text-4xl md:text-5xl font-bold text-gray-900 mb-4 tracking-tight">
              <span className="relative inline-block">
                <span className="relative z-10">{title.split(" ")[0]}</span>
                <span className="absolute bottom-2 left-0 w-full h-3 bg-orange-500/20 -z-10"></span>
              </span>{" "}
              {title.split(" ").slice(1).join(" ")}
            </h2>
            <p className="text-gray-600 text-lg leading-relaxed max-w-2xl">
              {description}
            </p>
          </div>

          <div className="w-full md:w-auto">
            <LocationSelector
              selectedLocation={location}
              onLocationChange={handleLocationChange}
              className="w-full md:w-auto"
            />
          </div>
        </div>

        <div className="bg-white rounded-xl shadow-md overflow-hidden">
          <ClassScheduleWidget selectedLocation={location} />
        </div>

        {showAllClassesLink && (
          <div className="mt-8 text-center">
            <Button variant="outline" size="lg" className="group">
              <span>View All Classes</span>
              <ArrowRight className="ml-2 h-4 w-4 transition-transform group-hover:translate-x-1" />
            </Button>
          </div>
        )}

        <div className="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6">
          <div className="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
            <Calendar className="h-8 w-8 text-primary mb-4" />
            <h3 className="text-xl font-bold mb-2">Personal Training</h3>
            <p className="text-gray-600 mb-4">
              Work one-on-one with our expert trainers to achieve your fitness
              goals faster.
            </p>
            <Button
              variant="link"
              className="p-0 text-primary flex items-center"
            >
              <span>Book a Session</span>
              <ArrowRight className="ml-1 h-4 w-4" />
            </Button>
          </div>

          <div className="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
            <Calendar className="h-8 w-8 text-primary mb-4" />
            <h3 className="text-xl font-bold mb-2">Special Workshops</h3>
            <p className="text-gray-600 mb-4">
              Join our specialized workshops led by guest instructors and
              fitness experts.
            </p>
            <Button
              variant="link"
              className="p-0 text-primary flex items-center"
            >
              <span>View Workshops</span>
              <ArrowRight className="ml-1 h-4 w-4" />
            </Button>
          </div>

          <div className="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
            <Calendar className="h-8 w-8 text-primary mb-4" />
            <h3 className="text-xl font-bold mb-2">Fitness Challenges</h3>
            <p className="text-gray-600 mb-4">
              Challenge yourself with our monthly fitness programs designed to
              push your limits.
            </p>
            <Button
              variant="link"
              className="p-0 text-primary flex items-center"
            >
              <span>Join a Challenge</span>
              <ArrowRight className="ml-1 h-4 w-4" />
            </Button>
          </div>
        </div>
      </div>
    </section>
  );
};

export default ClassScheduleSection;
