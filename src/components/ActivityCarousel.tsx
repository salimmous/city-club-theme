import React from "react";
import { ChevronLeft, ChevronRight } from "lucide-react";
import { Button } from "./ui/button";
import { GradientText } from "./ui/gradient-text";
import { RevealOnScroll } from "./ui/reveal-on-scroll";
import { TextReveal } from "./ui/text-reveal";
import {
  Carousel,
  CarouselContent,
  CarouselItem,
  CarouselNext,
  CarouselPrevious,
} from "./ui/carousel";
import "./ActivityCarousel.css";

interface Activity {
  id: string;
  title: string;
  description: string;
  image: string;
  color: string;
  buttonText: string;
}

interface ActivityCarouselProps {
  activities?: Activity[];
  title?: string;
  subtitle?: string;
}

const defaultActivities: Activity[] = [
  {
    id: "1",
    title: "MUSCULATION",
    description:
      "INDISPENSABLE POUR AFFINER SA TAILLE ET SOLIDIFIER SES MUSCLES",
    image:
      "https://images.unsplash.com/photo-1583454110551-21f2fa2afe61?w=800&q=80",
    color: "bg-red-700",
    buttonText: "ESSAYER L'ACTIVITÉ",
  },
  {
    id: "2",
    title: "XTREME ABDOS",
    description: "RENFORCEZ VOTRE CEINTURE ABDOMINALE AVEC NOS COURS INTENSIFS",
    image:
      "https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=800&q=80",
    color: "bg-red-700",
    buttonText: "ESSAYER L'ACTIVITÉ",
  },
  {
    id: "3",
    title: "ZEN-FIT",
    description:
      "RETROUVEZ VOTRE BIEN-ÊTRE EN AMÉLIORANT VOS EXPÉRIENCES SPORTIVES",
    image:
      "https://images.unsplash.com/photo-1599447292180-45fd84092ef4?w=800&q=80",
    color: "bg-purple-700",
    buttonText: "ESSAYER L'ACTIVITÉ",
  },
  {
    id: "4",
    title: "PILATES",
    description: "AMÉLIOREZ VOTRE POSTURE ET RENFORCEZ VOS MUSCLES PROFONDS",
    image:
      "https://images.unsplash.com/photo-1518611012118-696072aa579a?w=800&q=80",
    color: "bg-purple-700",
    buttonText: "ESSAYER L'ACTIVITÉ",
  },
  {
    id: "5",
    title: "BOXE & MMA",
    description:
      "COACHING - COURS COLLECTIFS - COURS INDIVIDUELS - APPRENTISSAGE",
    image:
      "https://images.unsplash.com/photo-1549824506-b7045a1a74a2?w=800&q=80",
    color: "bg-red-700",
    buttonText: "ESSAYER L'ACTIVITÉ",
  },
  {
    id: "6",
    title: "MMA",
    description: "APPRENEZ LES TECHNIQUES DE COMBAT MIXTE AVEC NOS EXPERTS",
    image:
      "https://images.unsplash.com/photo-1555597673-b21d5c935865?w=800&q=80",
    color: "bg-red-700",
    buttonText: "ESSAYER L'ACTIVITÉ",
  },
  {
    id: "7",
    title: "CARDIO",
    description: "MAÎTRISE DU RYTHME CARDIAQUE ET AMÉLIORATION DE L'ENDURANCE",
    image:
      "https://images.unsplash.com/photo-1534258936925-c58bed479fcb?w=800&q=80",
    color: "bg-green-700",
    buttonText: "ESSAYER L'ACTIVITÉ",
  },
  {
    id: "8",
    title: "BODY COMBAT",
    description:
      "BRÛLEZ DES CALORIES AVEC CE COURS DE FITNESS INSPIRÉ DES ARTS MARTIAUX",
    image:
      "https://images.unsplash.com/photo-1549576490-b0b4831ef60a?w=800&q=80",
    color: "bg-green-700",
    buttonText: "ESSAYER L'ACTIVITÉ",
  },
  {
    id: "9",
    title: "DANSE",
    description: "L'ART DE COMPOSER DES CHORÉGRAPHIES",
    image:
      "https://images.unsplash.com/photo-1504609773096-104ff2c73ba4?w=800&q=80",
    color: "bg-pink-700",
    buttonText: "ESSAYER L'ACTIVITÉ",
  },
  {
    id: "10",
    title: "DANSE ORIENTALE",
    description: "DÉCOUVREZ LES MOUVEMENTS GRACIEUX DE LA DANSE ORIENTALE",
    image:
      "https://images.unsplash.com/photo-1566852906212-b8465812ecd4?w=800&q=80",
    color: "bg-pink-700",
    buttonText: "ESSAYER L'ACTIVITÉ",
  },
  {
    id: "11",
    title: "FUNCTIONAL TRAINING",
    description:
      "RETROUVEZ VOTRE BIEN-ÊTRE EN AMÉLIORANT VOS EXPÉRIENCES SPORTIVES",
    image:
      "https://images.unsplash.com/photo-1434682881908-b43d0467b798?w=800&q=80",
    color: "bg-yellow-700",
    buttonText: "ESSAYER L'ACTIVITÉ",
  },
  {
    id: "12",
    title: "FUNCTIONAL ARMY",
    description: "ENTRAÎNEMENT FONCTIONNEL DE HAUTE INTENSITÉ EN GROUPE",
    image:
      "https://images.unsplash.com/photo-1519311965067-36d3e5f33d39?w=800&q=80",
    color: "bg-yellow-700",
    buttonText: "ESSAYER L'ACTIVITÉ",
  },
  {
    id: "13",
    title: "AQUAGYM",
    description: "L'ACTIVITÉ PHYSIQUE AUX MULTIPLES BIENFAITS",
    image:
      "https://images.unsplash.com/photo-1600965962361-9035dbfd1c50?w=800&q=80",
    color: "bg-blue-700",
    buttonText: "ESSAYER L'ACTIVITÉ",
  },
  {
    id: "14",
    title: "AQUA STRETCH",
    description:
      "AMÉLIOREZ VOTRE SOUPLESSE DANS L'EAU AVEC CET ENTRAÎNEMENT DOUX",
    image:
      "https://images.unsplash.com/photo-1600965962570-552d8b9d4580?w=800&q=80",
    color: "bg-blue-700",
    buttonText: "ESSAYER L'ACTIVITÉ",
  },
];

const ActivityCard: React.FC<Activity> = ({
  title,
  description,
  image,
  color,
  buttonText,
}) => {
  return (
    <div
      className={`activity-card ${color} relative overflow-hidden group rounded-2xl`}
    >
      <div className="absolute inset-0 bg-gradient-to-r from-black/70 to-black/30 z-10"></div>
      <div className="absolute -inset-1 bg-gradient-to-r from-orange-500/50 via-transparent to-teal-500/50 rounded-2xl blur-md opacity-0 group-hover:opacity-100 transition-all duration-700 z-0"></div>

      <div className="activity-content relative z-20">
        <div>
          <GradientText
            gradient="from-white via-white to-gray-300"
            className="activity-title font-black tracking-wide"
          >
            {title}
          </GradientText>
          <p className="activity-description">{description}</p>
        </div>
        <button className="activity-button relative overflow-hidden group-hover:before:translate-x-0 before:absolute before:inset-0 before:bg-gradient-to-r before:from-white/20 before:via-white/40 before:to-transparent before:-translate-x-full before:transition-transform before:duration-500 before:ease-out backdrop-blur-sm border border-white/30">
          <span className="relative z-10">{buttonText}</span>
          <span className="absolute right-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            →
          </span>
        </button>
      </div>

      <div className="activity-image relative z-0 overflow-hidden">
        <img
          src={image}
          alt={title}
          className="transition-transform duration-700 ease-in-out group-hover:scale-110"
        />
      </div>
    </div>
  );
};

const ActivityCarousel: React.FC<ActivityCarouselProps> = ({
  activities = defaultActivities,
  title = "NOS ACTIVITÉS",
  subtitle = "Découvrez notre large gamme d'activités pour tous les niveaux",
}) => {
  return (
    <div className="w-full bg-gray-50 py-24">
      <div className="container mx-auto px-4">
        <div className="text-center mb-16">
          <RevealOnScroll direction="up" delay={100}>
            <div className="flex items-center justify-center mb-4">
              <div className="h-1 w-12 bg-orange-500 rounded-full"></div>
              <div className="h-1 w-1 bg-orange-500 rounded-full mx-1"></div>
              <div className="h-1 w-1 bg-orange-500 rounded-full"></div>
            </div>
          </RevealOnScroll>

          <TextReveal
            text={title}
            as="h2"
            className="text-5xl md:text-6xl font-bold text-gray-900 mb-6 tracking-tight"
            wordByWord={true}
            wordDelay={80}
          />

          <RevealOnScroll direction="up" delay={400}>
            <p className="text-xl text-gray-600 max-w-3xl mx-auto">
              {subtitle}
            </p>
          </RevealOnScroll>
        </div>

        <Carousel
          opts={{
            align: "start",
            loop: true,
          }}
          className="w-full"
        >
          <CarouselContent>
            {activities.map((activity, index) => (
              <CarouselItem
                key={activity.id}
                className="md:basis-1/2 lg:basis-1/2 xl:basis-1/2 h-[450px] px-2"
              >
                <ActivityCard {...activity} />
              </CarouselItem>
            ))}
          </CarouselContent>
          <div className="carousel-navigation">
            <CarouselPrevious className="static translate-y-0 carousel-button" />
            <CarouselNext className="static translate-y-0 carousel-button" />
          </div>
        </Carousel>
      </div>
    </div>
  );
};

export default ActivityCarousel;
