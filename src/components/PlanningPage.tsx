import React, { useState, useEffect } from "react";
import {
  Search,
  Calendar,
  Download,
  MapPin,
  ChevronDown,
  ArrowRight,
  Clock,
  Info,
  X,
  Eye,
  Share2,
  Bookmark,
  Filter,
  Grid,
  Map,
} from "lucide-react";
import { Input } from "./ui/input";
import { Button } from "./ui/button";
import { MagneticButton } from "./ui/magnetic-button";
import { BlobBackground } from "./ui/blob-background";
import { RevealOnScroll } from "./ui/reveal-on-scroll";
import { TextReveal } from "./ui/text-reveal";
import {
  Dialog,
  DialogContent,
  DialogHeader,
  DialogTitle,
  DialogDescription,
  DialogFooter,
} from "./ui/dialog";
import { Tabs, TabsContent, TabsList, TabsTrigger } from "./ui/tabs";
import { Badge } from "./ui/badge";
import { Card, CardContent, CardFooter } from "./ui/card";
import {
  Tooltip,
  TooltipContent,
  TooltipProvider,
  TooltipTrigger,
} from "./ui/tooltip";

interface PlanningCard {
  id: string;
  title: string;
  location: string;
  image: string;
  downloadUrl: string;
  isAvailable: boolean;
  type: string;
  lastUpdated: string;
  description?: string;
  popularity?: number; // 1-5 scale
}

const PlanningPage = () => {
  const [searchTerm, setSearchTerm] = useState("");
  const [selectedCity, setSelectedCity] = useState("all");
  const [selectedType, setSelectedType] = useState("all");
  const [showFilters, setShowFilters] = useState(false);
  const [selectedPlanning, setSelectedPlanning] = useState<PlanningCard | null>(
    null,
  );
  const [isPreviewOpen, setIsPreviewOpen] = useState(false);
  const [isMapView, setIsMapView] = useState(false);
  const [sortBy, setSortBy] = useState<"popularity" | "date" | "name">(
    "popularity",
  );
  const [savedPlannings, setSavedPlannings] = useState<string[]>([]);

  // Scroll to top when page loads
  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  const planningCards: PlanningCard[] = [
    {
      id: "1",
      title: "Casa Ain Sebaa",
      location: "Casablanca",
      image:
        "https://images.unsplash.com/photo-1593079831268-3381b0db4a77?w=500&q=80",
      downloadUrl: "#",
      isAvailable: true,
      type: "ramadan",
      lastUpdated: "2023-03-15",
      description:
        "Planning complet pour le club City Club Ain Sebaa pendant le mois de Ramadan. Inclut tous les cours collectifs et les horaires d'ouverture spéciaux.",
      popularity: 4,
    },
    {
      id: "2",
      title: "Casa Lissasfa",
      location: "Casablanca",
      image:
        "https://images.unsplash.com/photo-1574680096145-d05b474e2155?w=500&q=80",
      downloadUrl: "#",
      isAvailable: true,
      type: "ramadan",
      lastUpdated: "2023-03-15",
      description:
        "Planning complet pour le club City Club Lissasfa pendant le mois de Ramadan. Inclut tous les cours collectifs et les horaires d'ouverture spéciaux.",
      popularity: 5,
    },
    {
      id: "3",
      title: "Casa Abdelmoumen",
      location: "Casablanca",
      image:
        "https://images.unsplash.com/photo-1571902943202-507ec2618e8f?w=500&q=80",
      downloadUrl: "#",
      isAvailable: true,
      type: "ramadan",
      lastUpdated: "2023-03-14",
      description:
        "Planning complet pour le club City Club Abdelmoumen pendant le mois de Ramadan. Inclut tous les cours collectifs et les horaires d'ouverture spéciaux.",
      popularity: 3,
    },
    {
      id: "4",
      title: "Casa Anfa",
      location: "Casablanca",
      image:
        "https://images.unsplash.com/photo-1540497077202-7c8a3999166f?w=500&q=80",
      downloadUrl: "#",
      isAvailable: true,
      type: "ramadan",
      lastUpdated: "2023-03-14",
      description:
        "Planning complet pour le club City Club Anfa pendant le mois de Ramadan. Inclut tous les cours collectifs et les horaires d'ouverture spéciaux.",
      popularity: 5,
    },
    {
      id: "5",
      title: "Casa Mohammed V",
      location: "Casablanca",
      image:
        "https://images.unsplash.com/photo-1534438327276-14e5300c3a48?w=500&q=80",
      downloadUrl: "#",
      isAvailable: true,
      type: "standard",
      lastUpdated: "2023-02-01",
      description:
        "Planning standard pour le club City Club Mohammed V. Inclut tous les cours collectifs et les horaires d'ouverture réguliers.",
      popularity: 4,
    },
    {
      id: "6",
      title: "Casa Val Fleuri",
      location: "Casablanca",
      image:
        "https://images.unsplash.com/photo-1593079831268-3381b0db4a77?w=500&q=80",
      downloadUrl: "#",
      isAvailable: true,
      type: "standard",
      lastUpdated: "2023-02-01",
      description:
        "Planning standard pour le club City Club Val Fleuri. Inclut tous les cours collectifs et les horaires d'ouverture réguliers.",
      popularity: 3,
    },
    {
      id: "7",
      title: "Casa Hay Hassani",
      location: "Casablanca",
      image:
        "https://images.unsplash.com/photo-1574680096145-d05b474e2155?w=500&q=80",
      downloadUrl: "#",
      isAvailable: true,
      type: "standard",
      lastUpdated: "2023-02-01",
      description:
        "Planning standard pour le club City Club Hay Hassani. Inclut tous les cours collectifs et les horaires d'ouverture réguliers.",
      popularity: 2,
    },
    {
      id: "8",
      title: "Agadir Centre",
      location: "Agadir",
      image:
        "https://images.unsplash.com/photo-1571902943202-507ec2618e8f?w=500&q=80",
      downloadUrl: "#",
      isAvailable: true,
      type: "ramadan",
      lastUpdated: "2023-03-15",
      description:
        "Planning complet pour le club City Club Agadir Centre pendant le mois de Ramadan. Inclut tous les cours collectifs et les horaires d'ouverture spéciaux.",
      popularity: 4,
    },
    {
      id: "9",
      title: "Agadir Tassila",
      location: "Agadir",
      image:
        "https://images.unsplash.com/photo-1540497077202-7c8a3999166f?w=500&q=80",
      downloadUrl: "#",
      isAvailable: true,
      type: "ramadan",
      lastUpdated: "2023-03-15",
      description:
        "Planning complet pour le club City Club Agadir Tassila pendant le mois de Ramadan. Inclut tous les cours collectifs et les horaires d'ouverture spéciaux.",
      popularity: 3,
    },
    {
      id: "10",
      title: "El-Jadida",
      location: "El-Jadida",
      image:
        "https://images.unsplash.com/photo-1534438327276-14e5300c3a48?w=500&q=80",
      downloadUrl: "#",
      isAvailable: true,
      type: "summer",
      lastUpdated: "2023-06-01",
      description:
        "Planning d'été pour le club City Club El-Jadida. Inclut tous les cours collectifs et les horaires d'ouverture spéciaux pour la saison estivale.",
      popularity: 3,
    },
    {
      id: "11",
      title: "Marrakech Gueliz",
      location: "Marrakech",
      image:
        "https://images.unsplash.com/photo-1593079831268-3381b0db4a77?w=500&q=80",
      downloadUrl: "#",
      isAvailable: true,
      type: "summer",
      lastUpdated: "2023-06-01",
      description:
        "Planning d'été pour le club City Club Marrakech Gueliz. Inclut tous les cours collectifs et les horaires d'ouverture spéciaux pour la saison estivale.",
      popularity: 5,
    },
    {
      id: "12",
      title: "Oujda",
      location: "Oujda",
      image:
        "https://images.unsplash.com/photo-1574680096145-d05b474e2155?w=500&q=80",
      downloadUrl: "#",
      isAvailable: false,
      type: "special",
      lastUpdated: "2023-07-15",
      description:
        "Planning spécial pour le club City Club Oujda. Ce planning sera bientôt disponible.",
      popularity: 2,
    },
    {
      id: "13",
      title: "Mohammedia ONCF",
      location: "Mohammedia",
      image:
        "https://images.unsplash.com/photo-1571902943202-507ec2618e8f?w=500&q=80",
      downloadUrl: "#",
      isAvailable: false,
      type: "special",
      lastUpdated: "2023-07-15",
      description:
        "Planning spécial pour le club City Club Mohammedia ONCF. Ce planning sera bientôt disponible.",
      popularity: 1,
    },
    {
      id: "14",
      title: "Rabat Hassan II",
      location: "Rabat",
      image:
        "https://images.unsplash.com/photo-1540497077202-7c8a3999166f?w=500&q=80",
      downloadUrl: "#",
      isAvailable: true,
      type: "ramadan",
      lastUpdated: "2023-03-15",
      description:
        "Planning complet pour le club City Club Rabat Hassan II pendant le mois de Ramadan. Inclut tous les cours collectifs et les horaires d'ouverture spéciaux.",
      popularity: 4,
    },
    {
      id: "15",
      title: "Tanger I",
      location: "Tanger",
      image:
        "https://images.unsplash.com/photo-1534438327276-14e5300c3a48?w=500&q=80",
      downloadUrl: "#",
      isAvailable: true,
      type: "ramadan",
      lastUpdated: "2023-03-15",
      description:
        "Planning complet pour le club City Club Tanger I pendant le mois de Ramadan. Inclut tous les cours collectifs et les horaires d'ouverture spéciaux.",
      popularity: 3,
    },
    {
      id: "16",
      title: "Sale ONCF",
      location: "Sale",
      image:
        "https://images.unsplash.com/photo-1593079831268-3381b0db4a77?w=500&q=80",
      downloadUrl: "#",
      isAvailable: true,
      type: "standard",
      lastUpdated: "2023-02-01",
      description:
        "Planning standard pour le club City Club Sale ONCF. Inclut tous les cours collectifs et les horaires d'ouverture réguliers.",
      popularity: 2,
    },
  ];

  const cities = [
    { value: "all", label: "Toutes les villes" },
    { value: "casablanca", label: "Casablanca" },
    { value: "agadir", label: "Agadir" },
    { value: "marrakech", label: "Marrakech" },
    { value: "rabat", label: "Rabat" },
    { value: "tanger", label: "Tanger" },
    { value: "el-jadida", label: "El-Jadida" },
    { value: "oujda", label: "Oujda" },
    { value: "mohammedia", label: "Mohammedia" },
    { value: "sale", label: "Sale" },
  ];

  const planningTypes = [
    { value: "all", label: "Tous les plannings", color: "bg-gray-500" },
    { value: "ramadan", label: "Ramadan", color: "bg-orange-500" },
    { value: "standard", label: "Standard", color: "bg-blue-500" },
    { value: "summer", label: "Été", color: "bg-green-500" },
    { value: "special", label: "Spécial", color: "bg-purple-500" },
  ];

  // Filter and sort cards
  const filteredCards = planningCards
    .filter((card) => {
      const matchesSearch =
        card.title.toLowerCase().includes(searchTerm.toLowerCase()) ||
        card.location.toLowerCase().includes(searchTerm.toLowerCase());
      const matchesCity =
        selectedCity === "all" ||
        card.location.toLowerCase() === selectedCity.toLowerCase();
      const matchesType = selectedType === "all" || card.type === selectedType;
      return matchesSearch && matchesCity && matchesType;
    })
    .sort((a, b) => {
      if (sortBy === "popularity") {
        return (b.popularity || 0) - (a.popularity || 0);
      } else if (sortBy === "date") {
        return (
          new Date(b.lastUpdated).getTime() - new Date(a.lastUpdated).getTime()
        );
      } else {
        return a.title.localeCompare(b.title);
      }
    });

  const handleCardClick = (card: PlanningCard) => {
    setSelectedPlanning(card);
    setIsPreviewOpen(true);
  };

  const toggleSavedPlanning = (id: string, e: React.MouseEvent) => {
    e.stopPropagation();
    setSavedPlannings((prev) =>
      prev.includes(id) ? prev.filter((item) => item !== id) : [...prev, id],
    );
  };

  const getTypeColor = (type: string) => {
    const typeObj = planningTypes.find((t) => t.value === type);
    return typeObj ? typeObj.color : "bg-gray-500";
  };

  const getTypeLabel = (type: string) => {
    const typeObj = planningTypes.find((t) => t.value === type);
    return typeObj ? typeObj.label : "Inconnu";
  };

  const formatDate = (dateString: string) => {
    const date = new Date(dateString);
    return new Intl.DateTimeFormat("fr-FR", {
      day: "numeric",
      month: "long",
      year: "numeric",
    }).format(date);
  };

  return (
    <div className="min-h-screen bg-background">
      {/* Hero Section */}
      <section className="relative pt-32 pb-20 overflow-hidden">
        <BlobBackground
          className="absolute inset-0 -z-10"
          blobColors={["bg-orange-500", "bg-teal-500", "bg-blue-500"]}
          blobCount={3}
          blur="blur-3xl"
          opacity="opacity-20"
        />
        <div className="absolute inset-0 bg-gradient-to-b from-gray-900 via-gray-900/90 to-gray-900/80 -z-10 dark:opacity-80"></div>

        <div className="container mx-auto px-4 relative z-10">
          <div className="max-w-4xl mx-auto text-center">
            <RevealOnScroll direction="up" delay={100}>
              <Badge className="mb-6 px-4 py-1.5 text-sm bg-orange-500/20 text-orange-500 border-orange-500/30 backdrop-blur-sm">
                PLUS DE 42 CLUBS AU MAROC
              </Badge>
            </RevealOnScroll>

            <TextReveal
              text="Plannings des Clubs"
              as="h1"
              className="text-5xl md:text-7xl font-black mb-6 tracking-tight text-white"
              revealDelay={300}
            />

            <RevealOnScroll direction="up" delay={400}>
              <p className="text-xl text-gray-300 mb-10 max-w-3xl mx-auto">
                Consultez et téléchargez les plannings de tous nos clubs à
                travers le Maroc. Restez informé des horaires et des activités
                disponibles dans chaque club.
              </p>
            </RevealOnScroll>

            <div className="flex flex-col sm:flex-row justify-center gap-4 mt-8">
              <MagneticButton
                strength={20}
                className="bg-gradient-to-r from-orange-500 to-orange-600 text-white font-bold py-4 px-8 rounded-xl relative overflow-hidden group transition-all duration-300 hover:shadow-xl hover:shadow-orange-500/30 hover:scale-105 btn-primary"
                onClick={() =>
                  window.scrollTo({
                    top:
                      (document.getElementById("planning-cards")?.offsetTop ||
                        0) - 100,
                    behavior: "smooth",
                  })
                }
              >
                <span className="relative z-10 flex items-center">
                  VOIR LES PLANNINGS <ArrowRight className="ml-2 h-5 w-5" />
                </span>
                <span className="absolute top-0 -left-[100%] w-[120%] h-full bg-gradient-to-r from-transparent via-white/20 to-transparent skew-x-[25deg] animate-[glint_3s_ease-in-out_infinite_alternate]"></span>
              </MagneticButton>

              <MagneticButton
                strength={20}
                className="backdrop-blur-md bg-white/10 border-2 border-white/50 text-white hover:bg-white hover:text-gray-900 font-bold py-4 px-8 rounded-xl transition-all duration-300 hover:shadow-lg hover:shadow-white/30 hover:scale-105 btn-outline"
                onClick={() => setIsMapView(!isMapView)}
              >
                <span className="relative z-10 flex items-center">
                  {isMapView ? "VUE GRILLE" : "VUE CARTE"}{" "}
                  <MapPin className="ml-2 h-5 w-5" />
                </span>
              </MagneticButton>
            </div>
          </div>
        </div>
      </section>

      {/* Search and Filters Section */}
      <section className="py-4 bg-background border-b border-border sticky top-20 z-30 dark:bg-background/95 backdrop-blur-sm">
        <div className="container mx-auto px-4">
          <div className="flex flex-col md:flex-row items-center justify-between gap-4">
            <div className="w-full md:w-auto relative">
              <Input
                type="text"
                placeholder="Rechercher un club..."
                value={searchTerm}
                onChange={(e) => setSearchTerm(e.target.value)}
                className="pl-10 pr-4 py-2 w-full md:w-64 border-input focus:ring-orange-500 focus-visible:ring-orange-500"
              />
              <Search className="absolute left-3 top-1/2 transform -translate-y-1/2 text-muted-foreground h-4 w-4" />
            </div>

            <div className="flex items-center gap-2 w-full md:w-auto">
              <Button
                variant="outline"
                className="flex items-center gap-2 w-full md:w-auto"
                onClick={() => setShowFilters(!showFilters)}
              >
                <Filter className="h-4 w-4" />
                <span>Filtres</span>
                <ChevronDown
                  className={`h-4 w-4 transition-transform ${showFilters ? "rotate-180" : ""}`}
                />
              </Button>

              <div className="flex items-center gap-1 border border-input rounded-md">
                <Button
                  variant="ghost"
                  size="icon"
                  className={`rounded-none ${!isMapView ? "bg-orange-500/10 text-orange-500" : ""}`}
                  onClick={() => setIsMapView(false)}
                >
                  <Grid className="h-4 w-4" />
                </Button>
                <Button
                  variant="ghost"
                  size="icon"
                  className={`rounded-none ${isMapView ? "bg-orange-500/10 text-orange-500" : ""}`}
                  onClick={() => setIsMapView(true)}
                >
                  <Map className="h-4 w-4" />
                </Button>
              </div>

              {(selectedCity !== "all" || selectedType !== "all") && (
                <Button
                  variant="ghost"
                  size="sm"
                  className="text-xs"
                  onClick={() => {
                    setSelectedCity("all");
                    setSelectedType("all");
                  }}
                >
                  <X className="h-3 w-3 mr-1" /> Réinitialiser
                </Button>
              )}
            </div>
          </div>

          {showFilters && (
            <div className="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4 p-4 bg-muted/30 rounded-lg">
              <div>
                <p className="text-sm font-medium mb-2 text-foreground">
                  Ville
                </p>
                <div className="flex flex-wrap gap-2">
                  {cities.map((city) => (
                    <Badge
                      key={city.value}
                      variant={
                        selectedCity === city.value ? "default" : "outline"
                      }
                      className={`cursor-pointer ${selectedCity === city.value ? "bg-orange-500 hover:bg-orange-600" : "hover:bg-muted"}`}
                      onClick={() => setSelectedCity(city.value)}
                    >
                      {city.label}
                    </Badge>
                  ))}
                </div>
              </div>

              <div>
                <p className="text-sm font-medium mb-2 text-foreground">
                  Type de planning
                </p>
                <div className="flex flex-wrap gap-2">
                  {planningTypes.map((type) => (
                    <Badge
                      key={type.value}
                      variant={
                        selectedType === type.value ? "default" : "outline"
                      }
                      className={`cursor-pointer ${selectedType === type.value ? type.color + " hover:opacity-90" : "hover:bg-muted"}`}
                      onClick={() => setSelectedType(type.value)}
                    >
                      {type.label}
                    </Badge>
                  ))}
                </div>
              </div>

              <div>
                <p className="text-sm font-medium mb-2 text-foreground">
                  Trier par
                </p>
                <div className="flex flex-wrap gap-2">
                  <Badge
                    variant={sortBy === "popularity" ? "default" : "outline"}
                    className={`cursor-pointer ${sortBy === "popularity" ? "bg-orange-500 hover:bg-orange-600" : "hover:bg-muted"}`}
                    onClick={() => setSortBy("popularity")}
                  >
                    Popularité
                  </Badge>
                  <Badge
                    variant={sortBy === "date" ? "default" : "outline"}
                    className={`cursor-pointer ${sortBy === "date" ? "bg-orange-500 hover:bg-orange-600" : "hover:bg-muted"}`}
                    onClick={() => setSortBy("date")}
                  >
                    Date de mise à jour
                  </Badge>
                  <Badge
                    variant={sortBy === "name" ? "default" : "outline"}
                    className={`cursor-pointer ${sortBy === "name" ? "bg-orange-500 hover:bg-orange-600" : "hover:bg-muted"}`}
                    onClick={() => setSortBy("name")}
                  >
                    Nom
                  </Badge>
                </div>
              </div>
            </div>
          )}
        </div>
      </section>

      {/* Planning Cards Section */}
      <section id="planning-cards" className="py-12 bg-background">
        <div className="container mx-auto px-4">
          {filteredCards.length > 0 ? (
            <>
              <div className="flex justify-between items-center mb-6">
                <h2 className="text-2xl font-bold text-foreground">
                  {filteredCards.length}{" "}
                  {filteredCards.length > 1
                    ? "Plannings trouvés"
                    : "Planning trouvé"}
                </h2>

                <div className="flex items-center gap-2">
                  {savedPlannings.length > 0 && (
                    <Badge
                      variant="outline"
                      className="flex items-center gap-1"
                    >
                      <Bookmark className="h-3 w-3" fill="currentColor" />
                      {savedPlannings.length} sauvegardé
                      {savedPlannings.length > 1 ? "s" : ""}
                    </Badge>
                  )}
                </div>
              </div>

              {isMapView ? (
                <div className="relative w-full h-[600px] bg-muted rounded-xl overflow-hidden shadow-lg">
                  <div className="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1569336415962-a4bd9f69c07a?w=1200&q=80')] bg-cover bg-center opacity-50 dark:opacity-30"></div>
                  <div className="absolute inset-0 bg-gradient-to-b from-transparent to-black/50"></div>

                  {/* This would be replaced with an actual map component */}
                  <div className="absolute inset-0 flex items-center justify-center">
                    <div className="text-center bg-black/40 backdrop-blur-sm p-6 rounded-xl border border-white/10">
                      <p className="text-white text-xl font-bold dark:text-white/90 mb-4">
                        Carte interactive des clubs
                      </p>
                      <p className="text-white/80 max-w-md">
                        Explorez nos 42 clubs à travers le Maroc. Cliquez sur un
                        marqueur pour voir les détails du club et accéder à son
                        planning.
                      </p>
                    </div>
                  </div>

                  {/* Markers for each location */}
                  {filteredCards.map((card, index) => (
                    <div
                      key={card.id}
                      className="absolute cursor-pointer transform -translate-x-1/2 -translate-y-1/2 hover:z-10"
                      style={{
                        left: `${((index * 50) % 80) + 10}%`,
                        top: `${((index * 30) % 70) + 15}%`,
                      }}
                      onClick={() => handleCardClick(card)}
                    >
                      <div
                        className={`p-1 rounded-full bg-white text-white shadow-lg`}
                      >
                        <div
                          className={`${getTypeColor(card.type)} p-2 rounded-full flex items-center justify-center`}
                        >
                          <MapPin size={24} />
                        </div>
                      </div>
                      <div className="absolute top-full left-1/2 transform -translate-x-1/2 mt-1 bg-white px-2 py-1 rounded text-xs font-bold shadow-md whitespace-nowrap">
                        {card.title}
                      </div>
                    </div>
                  ))}
                </div>
              ) : (
                <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                  {filteredCards.map((card) => (
                    <Card
                      key={card.id}
                      className="overflow-hidden transition-all hover:shadow-xl hover:-translate-y-1 group cursor-pointer card-hover-effect"
                      onClick={() => handleCardClick(card)}
                    >
                      <div className="relative overflow-hidden">
                        <img
                          src={card.image}
                          alt={card.title}
                          className="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-110"
                        />
                        <div className="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div
                          className={`absolute top-3 right-3 ${getTypeColor(card.type)} text-white text-xs font-bold px-2 py-1 rounded`}
                        >
                          {getTypeLabel(card.type).toUpperCase()}
                        </div>

                        <div className="absolute bottom-3 right-3 bg-white/80 backdrop-blur-sm text-gray-800 text-xs font-medium px-2 py-1 rounded-full">
                          <Clock className="inline-block h-3 w-3 mr-1" />
                          Mis à jour le {formatDate(card.lastUpdated)}
                        </div>
                      </div>
                      <CardContent className="p-4">
                        <h3 className="text-lg font-bold mb-1 text-foreground group-hover:text-orange-500 transition-colors">
                          {card.title}
                        </h3>
                        <div className="flex items-center text-muted-foreground text-sm mb-4">
                          <MapPin className="h-4 w-4 mr-1" />
                          <span>{card.location}</span>
                        </div>
                      </CardContent>
                      <CardFooter className="p-4 pt-0 flex items-center justify-between">
                        <TooltipProvider>
                          <Tooltip>
                            <TooltipTrigger asChild>
                              <Button
                                variant="ghost"
                                size="icon"
                                className="rounded-full hover:text-orange-500"
                                onClick={(e) => toggleSavedPlanning(card.id, e)}
                              >
                                <Bookmark
                                  className="h-4 w-4"
                                  fill={
                                    savedPlannings.includes(card.id)
                                      ? "currentColor"
                                      : "none"
                                  }
                                />
                              </Button>
                            </TooltipTrigger>
                            <TooltipContent>
                              {savedPlannings.includes(card.id)
                                ? "Retirer des favoris"
                                : "Ajouter aux favoris"}
                            </TooltipContent>
                          </Tooltip>
                        </TooltipProvider>

                        <div className="flex gap-2">
                          <Button
                            variant="outline"
                            size="sm"
                            className="text-foreground hover:text-orange-500"
                            onClick={(e) => {
                              e.stopPropagation();
                              handleCardClick(card);
                            }}
                          >
                            <Eye className="h-4 w-4 mr-1" />
                            Aperçu
                          </Button>

                          <Button
                            size="sm"
                            className={`${card.isAvailable ? "bg-orange-500 hover:bg-orange-600" : "bg-gray-300 cursor-not-allowed"}`}
                            disabled={!card.isAvailable}
                            onClick={(e) => e.stopPropagation()}
                          >
                            <Download className="h-4 w-4 mr-1" />
                            {card.isAvailable ? "Télécharger" : "Bientôt"}
                          </Button>
                        </div>
                      </CardFooter>
                    </Card>
                  ))}
                </div>
              )}
            </>
          ) : (
            <div className="text-center py-16 bg-card rounded-xl shadow-sm">
              <Calendar className="h-16 w-16 mx-auto text-muted-foreground mb-4" />
              <h3 className="text-xl font-medium text-foreground mb-2">
                Aucun planning trouvé
              </h3>
              <p className="text-muted-foreground max-w-md mx-auto mb-6">
                Aucun planning ne correspond à vos critères de recherche.
                Veuillez modifier vos filtres ou essayer une autre recherche.
              </p>
              <Button
                variant="outline"
                onClick={() => {
                  setSearchTerm("");
                  setSelectedCity("all");
                  setSelectedType("all");
                }}
              >
                Réinitialiser les filtres
              </Button>
            </div>
          )}
        </div>
      </section>

      {/* Info Section */}
      <section className="py-16 bg-background">
        <div className="container mx-auto px-4">
          <div className="max-w-3xl mx-auto">
            <RevealOnScroll direction="up">
              <div className="bg-gradient-to-br from-orange-50 to-orange-100 dark:from-orange-950/20 dark:to-orange-900/10 rounded-2xl p-8 border border-orange-200 dark:border-orange-900/50 shadow-lg relative overflow-hidden card-hover-effect">
                <div className="absolute -top-12 -right-12 w-24 h-24 bg-orange-500/10 rounded-full blur-2xl"></div>
                <div className="absolute -bottom-12 -left-12 w-24 h-24 bg-orange-500/10 rounded-full blur-2xl"></div>

                <div className="flex items-start gap-4">
                  <div className="bg-orange-500/20 dark:bg-orange-500/10 p-3 rounded-full">
                    <Info className="h-6 w-6 text-orange-600 dark:text-orange-500" />
                  </div>

                  <div>
                    <h2 className="text-2xl font-bold mb-4 text-foreground">
                      Information Importante
                    </h2>
                    <p className="text-foreground/80 mb-4">
                      Les plannings sont susceptibles de changer en fonction des
                      circonstances. Veuillez vérifier régulièrement cette page
                      pour les mises à jour ou contactez directement votre club
                      local pour les informations les plus récentes.
                    </p>
                    <p className="text-foreground/80">
                      Pour toute question concernant les plannings, n'hésitez
                      pas à contacter notre service client au{" "}
                      <span className="font-semibold text-orange-600 dark:text-orange-500">
                        +212 522 123 456
                      </span>{" "}
                      ou par email à{" "}
                      <span className="font-semibold text-orange-600 dark:text-orange-500">
                        info@cityclubmaroc.com
                      </span>
                      .
                    </p>
                  </div>
                </div>
              </div>
            </RevealOnScroll>
          </div>
        </div>
      </section>

      {/* Planning Preview Dialog */}
      <Dialog open={isPreviewOpen} onOpenChange={setIsPreviewOpen}>
        <DialogContent className="max-w-3xl">
          {selectedPlanning && (
            <>
              <DialogHeader>
                <div className="flex items-center justify-between">
                  <DialogTitle className="text-2xl">
                    {selectedPlanning.title}
                  </DialogTitle>
                  <Badge className={getTypeColor(selectedPlanning.type)}>
                    {getTypeLabel(selectedPlanning.type)}
                  </Badge>
                </div>
                <DialogDescription className="flex items-center text-muted-foreground">
                  <MapPin className="h-4 w-4 mr-1" />
                  {selectedPlanning.location}
                </DialogDescription>
              </DialogHeader>

              <div className="relative h-64 overflow-hidden rounded-lg mb-4">
                <img
                  src={selectedPlanning.image}
                  alt={selectedPlanning.title}
                  className="w-full h-full object-cover"
                />
                <div className="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                <div className="absolute bottom-4 left-4 text-white">
                  <p className="text-sm font-medium flex items-center">
                    <Clock className="h-4 w-4 mr-1" />
                    Mis à jour le {formatDate(selectedPlanning.lastUpdated)}
                  </p>
                </div>
              </div>

              <div className="mb-6">
                <h3 className="text-lg font-semibold mb-2">Description</h3>
                <p className="text-muted-foreground">
                  {selectedPlanning.description}
                </p>
              </div>

              <div className="bg-muted p-4 rounded-lg mb-6">
                <h3 className="text-lg font-semibold mb-2">
                  Aperçu du planning
                </h3>
                <div className="aspect-[1.414/1] bg-card rounded border border-input flex items-center justify-center">
                  <p className="text-muted-foreground">
                    Aperçu du planning non disponible
                  </p>
                </div>
              </div>

              <DialogFooter className="flex items-center justify-between sm:justify-between gap-2">
                <Button
                  variant="outline"
                  size="icon"
                  className="rounded-full"
                  onClick={(e) => toggleSavedPlanning(selectedPlanning.id, e)}
                >
                  <Bookmark
                    className="h-4 w-4"
                    fill={
                      savedPlannings.includes(selectedPlanning.id)
                        ? "currentColor"
                        : "none"
                    }
                  />
                </Button>

                <div className="flex gap-2">
                  <Button
                    variant="outline"
                    onClick={() => setIsPreviewOpen(false)}
                  >
                    Fermer
                  </Button>
                  <Button
                    className={`${selectedPlanning.isAvailable ? "bg-orange-500 hover:bg-orange-600" : "bg-gray-300 cursor-not-allowed"}`}
                    disabled={!selectedPlanning.isAvailable}
                  >
                    <Download className="h-4 w-4 mr-2" />
                    {selectedPlanning.isAvailable
                      ? "Télécharger le planning"
                      : "Bientôt disponible"}
                  </Button>
                </div>
              </DialogFooter>
            </>
          )}
        </DialogContent>
      </Dialog>
    </div>
  );
};

export default PlanningPage;
