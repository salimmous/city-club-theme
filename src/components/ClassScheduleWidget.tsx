import React, { useState } from "react";
import { Tabs, TabsList, TabsTrigger, TabsContent } from "@/components/ui/tabs";
import {
  Select,
  SelectTrigger,
  SelectValue,
  SelectContent,
  SelectItem,
} from "@/components/ui/select";
import { Button } from "@/components/ui/button";
import { Badge } from "@/components/ui/badge";
import { Card, CardContent } from "@/components/ui/card";
import { Calendar, Clock, Filter, MapPin, Users } from "lucide-react";

interface ClassType {
  id: string;
  name: string;
  instructor: string;
  time: string;
  duration: string;
  location: string;
  capacity: number;
  enrolled: number;
  type: string;
  level: "Beginner" | "Intermediate" | "Advanced";
  day: string;
}

interface ClassScheduleWidgetProps {
  classes?: ClassType[];
  selectedLocation?: string;
}

const defaultClasses: ClassType[] = [
  {
    id: "1",
    name: "Power Yoga",
    instructor: "Sarah Ahmed",
    time: "07:00",
    duration: "60 min",
    location: "Casablanca Downtown",
    capacity: 20,
    enrolled: 15,
    type: "Yoga",
    level: "Intermediate",
    day: "Monday",
  },
  {
    id: "2",
    name: "HIIT Circuit",
    instructor: "Mohammed Khalid",
    time: "18:30",
    duration: "45 min",
    location: "Casablanca Downtown",
    capacity: 15,
    enrolled: 12,
    type: "Cardio",
    level: "Advanced",
    day: "Monday",
  },
  {
    id: "3",
    name: "Beginner Pilates",
    instructor: "Leila Benali",
    time: "10:00",
    duration: "50 min",
    location: "Rabat Central",
    capacity: 12,
    enrolled: 8,
    type: "Pilates",
    level: "Beginner",
    day: "Tuesday",
  },
  {
    id: "4",
    name: "Spin Class",
    instructor: "Karim Tazi",
    time: "19:00",
    duration: "45 min",
    location: "Marrakech Plaza",
    capacity: 25,
    enrolled: 20,
    type: "Cardio",
    level: "Intermediate",
    day: "Tuesday",
  },
  {
    id: "5",
    name: "Strength Training",
    instructor: "Youssef Amrani",
    time: "08:00",
    duration: "60 min",
    location: "Tangier Bay",
    capacity: 15,
    enrolled: 10,
    type: "Strength",
    level: "Intermediate",
    day: "Wednesday",
  },
  {
    id: "6",
    name: "Zumba",
    instructor: "Fatima Zahra",
    time: "17:30",
    duration: "60 min",
    location: "Casablanca Downtown",
    capacity: 30,
    enrolled: 28,
    type: "Dance",
    level: "Beginner",
    day: "Wednesday",
  },
  {
    id: "7",
    name: "CrossFit",
    instructor: "Omar Bensouda",
    time: "06:30",
    duration: "60 min",
    location: "Rabat Central",
    capacity: 12,
    enrolled: 12,
    type: "Strength",
    level: "Advanced",
    day: "Thursday",
  },
  {
    id: "8",
    name: "Meditation",
    instructor: "Amina Chaoui",
    time: "19:30",
    duration: "30 min",
    location: "Marrakech Plaza",
    capacity: 20,
    enrolled: 10,
    type: "Mind & Body",
    level: "Beginner",
    day: "Thursday",
  },
  {
    id: "9",
    name: "Boxing",
    instructor: "Hassan Idrissi",
    time: "18:00",
    duration: "60 min",
    location: "Tangier Bay",
    capacity: 15,
    enrolled: 13,
    type: "Combat",
    level: "Intermediate",
    day: "Friday",
  },
  {
    id: "10",
    name: "Aqua Fitness",
    instructor: "Nadia Belmkaddem",
    time: "11:00",
    duration: "45 min",
    location: "Casablanca Downtown",
    capacity: 20,
    enrolled: 15,
    type: "Aquatic",
    level: "Beginner",
    day: "Friday",
  },
  {
    id: "11",
    name: "Weekend Bootcamp",
    instructor: "Rachid El Ouali",
    time: "09:00",
    duration: "90 min",
    location: "Rabat Central",
    capacity: 25,
    enrolled: 22,
    type: "Cardio",
    level: "Advanced",
    day: "Saturday",
  },
  {
    id: "12",
    name: "Family Yoga",
    instructor: "Samira Bennani",
    time: "10:30",
    duration: "60 min",
    location: "Marrakech Plaza",
    capacity: 30,
    enrolled: 25,
    type: "Yoga",
    level: "Beginner",
    day: "Sunday",
  },
];

const days = [
  "Monday",
  "Tuesday",
  "Wednesday",
  "Thursday",
  "Friday",
  "Saturday",
  "Sunday",
];
const classTypes = [
  "All Types",
  "Yoga",
  "Pilates",
  "Cardio",
  "Strength",
  "Dance",
  "Mind & Body",
  "Combat",
  "Aquatic",
];
const levels = ["All Levels", "Beginner", "Intermediate", "Advanced"];

const ClassScheduleWidget = ({
  classes = defaultClasses,
  selectedLocation = "All Locations",
}: ClassScheduleWidgetProps) => {
  const [activeDay, setActiveDay] = useState("Monday");
  const [selectedType, setSelectedType] = useState("All Types");
  const [selectedLevel, setSelectedLevel] = useState("All Levels");

  // Filter classes based on selected filters
  const filteredClasses = classes.filter((cls) => {
    const matchesDay = cls.day === activeDay;
    const matchesType =
      selectedType === "All Types" || cls.type === selectedType;
    const matchesLevel =
      selectedLevel === "All Levels" || cls.level === selectedLevel;
    const matchesLocation =
      selectedLocation === "All Locations" || cls.location === selectedLocation;

    return matchesDay && matchesType && matchesLevel && matchesLocation;
  });

  return (
    <div className="w-full bg-white rounded-xl shadow-lg p-8">
      <div className="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <h3 className="text-2xl font-bold text-gray-800 flex items-center">
          <Calendar className="h-6 w-6 text-orange-500 mr-2" />
          Planning Hebdomadaire
        </h3>

        <div className="flex flex-wrap gap-3">
          <div className="w-full sm:w-auto">
            <Select value={selectedType} onValueChange={setSelectedType}>
              <SelectTrigger className="w-full sm:w-[180px] border-orange-200 focus:ring-orange-500">
                <Filter className="h-4 w-4 mr-2 text-orange-500" />
                <SelectValue placeholder="Type de Cours" />
              </SelectTrigger>
              <SelectContent>
                {classTypes.map((type) => (
                  <SelectItem key={type} value={type}>
                    {type}
                  </SelectItem>
                ))}
              </SelectContent>
            </Select>
          </div>

          <div className="w-full sm:w-auto">
            <Select value={selectedLevel} onValueChange={setSelectedLevel}>
              <SelectTrigger className="w-full sm:w-[180px] border-orange-200 focus:ring-orange-500">
                <Users className="h-4 w-4 mr-2 text-orange-500" />
                <SelectValue placeholder="Niveau" />
              </SelectTrigger>
              <SelectContent>
                {levels.map((level) => (
                  <SelectItem key={level} value={level}>
                    {level}
                  </SelectItem>
                ))}
              </SelectContent>
            </Select>
          </div>
        </div>
      </div>

      <Tabs value={activeDay} onValueChange={setActiveDay} className="w-full">
        <TabsList className="w-full mb-8 flex overflow-x-auto bg-gray-100 p-1">
          {days.map((day) => (
            <TabsTrigger
              key={day}
              value={day}
              className="flex-1 min-w-[100px] data-[state=active]:bg-orange-500 data-[state=active]:text-white"
            >
              {day}
            </TabsTrigger>
          ))}
        </TabsList>

        {days.map((day) => (
          <TabsContent key={day} value={day} className="mt-0">
            {filteredClasses.length > 0 ? (
              <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                {filteredClasses.map((cls) => (
                  <Card
                    key={cls.id}
                    className="overflow-hidden border-l-4 border-l-primary hover:shadow-lg transition-shadow duration-300 group"
                  >
                    <CardContent className="p-4">
                      <div className="flex justify-between items-start mb-2">
                        <h4 className="font-bold text-lg">{cls.name}</h4>
                        <Badge
                          variant={
                            cls.enrolled >= cls.capacity
                              ? "destructive"
                              : "default"
                          }
                        >
                          {cls.enrolled >= cls.capacity
                            ? "Full"
                            : `${cls.enrolled}/${cls.capacity}`}
                        </Badge>
                      </div>

                      <div className="flex items-center text-sm text-gray-600 mb-1">
                        <Clock className="h-4 w-4 mr-1" />
                        <span>
                          {cls.time} • {cls.duration}
                        </span>
                      </div>

                      <div className="flex items-center text-sm text-gray-600 mb-1">
                        <MapPin className="h-4 w-4 mr-1" />
                        <span>{cls.location}</span>
                      </div>

                      <div className="flex items-center text-sm text-gray-600 mb-3">
                        <Users className="h-4 w-4 mr-1" />
                        <span>{cls.instructor}</span>
                      </div>

                      <div className="flex items-center justify-between mt-4">
                        <div className="flex gap-2">
                          <Badge variant="secondary">{cls.type}</Badge>
                          <Badge variant="outline">{cls.level}</Badge>
                        </div>
                        <Button
                          size="sm"
                          disabled={cls.enrolled >= cls.capacity}
                          className="bg-gradient-to-r from-orange-500 to-orange-600 text-white group-hover:shadow-md transition-all duration-300 group-hover:scale-105"
                        >
                          {cls.enrolled >= cls.capacity
                            ? "Liste d'attente"
                            : "Réserver"}
                        </Button>
                      </div>
                    </CardContent>
                  </Card>
                ))}
              </div>
            ) : (
              <div className="text-center py-12 bg-gray-50 rounded-lg">
                <Calendar className="h-12 w-12 mx-auto text-gray-400 mb-4" />
                <h3 className="text-xl font-medium text-gray-700 mb-2">
                  No Classes Available
                </h3>
                <p className="text-gray-500 max-w-md mx-auto">
                  There are no classes matching your current filters. Try
                  changing your filters or check another day.
                </p>
              </div>
            )}
          </TabsContent>
        ))}
      </Tabs>
    </div>
  );
};

export default ClassScheduleWidget;
