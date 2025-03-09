import React, { useState, useEffect } from "react";
import { ChevronRight, ChevronLeft } from "lucide-react";
import { Button } from "./ui/button";
import { MagneticButton } from "./ui/magnetic-button";
import { GradientText } from "./ui/gradient-text";
import { TextReveal } from "./ui/text-reveal";
import LocationSelector from "./LocationSelector";

interface HeroSlide {
  id: string;
  image: string;
  title: string;
  subtitle: string;
  locationId: string;
}

interface HeroSectionProps {
  slides?: HeroSlide[];
  autoplayInterval?: number;
  onLocationChange?: (locationId: string) => void;
}

const HeroSection = ({
  slides = [
    {
      id: "slide1",
      image:
        "https://images.unsplash.com/photo-1534438327276-14e5300c3a48?w=1200&q=80",
      title: "REPRENEZ EN MAIN VOTRE SANTÉ",
      subtitle: "Avec le bilan médico-sportif et nos 600+ coachs certifiés",
      locationId: "loc1",
    },
    {
      id: "slide2",
      image:
        "https://images.unsplash.com/photo-1571902943202-507ec2618e8f?w=1200&q=80",
      title: "Marrakech Medina",
      subtitle: "Experience fitness with a view of the historic Medina",
      locationId: "loc2",
    },
    {
      id: "slide3",
      image:
        "https://images.unsplash.com/photo-1540497077202-7c8a3999166f?w=1200&q=80",
      title: "Rabat Agdal",
      subtitle: "Modern facilities in the heart of the capital",
      locationId: "loc3",
    },
    {
      id: "slide4",
      image:
        "https://images.unsplash.com/photo-1593079831268-3381b0db4a77?w=1200&q=80",
      title: "Tangier Bay",
      subtitle: "Workout with panoramic views of the Mediterranean",
      locationId: "loc4",
    },
    {
      id: "slide5",
      image:
        "https://images.unsplash.com/photo-1574680096145-d05b474e2155?w=1200&q=80",
      title: "Fes Medina",
      subtitle: "Traditional Moroccan architecture meets modern fitness",
      locationId: "loc5",
    },
  ],
  autoplayInterval = 5000,
  onLocationChange = () => {},
}: HeroSectionProps) => {
  const [currentSlide, setCurrentSlide] = useState(0);
  const [selectedLocation, setSelectedLocation] = useState(
    slides[0].locationId,
  );
  const [isAutoPlaying, setIsAutoPlaying] = useState(true);

  // Handle location change
  const handleLocationChange = (locationId: string) => {
    setSelectedLocation(locationId);
    onLocationChange(locationId);

    // Find the slide index that matches the location
    const slideIndex = slides.findIndex(
      (slide) => slide.locationId === locationId,
    );
    if (slideIndex !== -1) {
      setCurrentSlide(slideIndex);
      setIsAutoPlaying(false); // Pause autoplay when user selects a location
    }
  };

  // Navigate to next slide
  const nextSlide = () => {
    setCurrentSlide((prev) => (prev === slides.length - 1 ? 0 : prev + 1));
    setSelectedLocation(
      slides[currentSlide === slides.length - 1 ? 0 : currentSlide + 1]
        .locationId,
    );
    setIsAutoPlaying(false);
  };

  // Navigate to previous slide
  const prevSlide = () => {
    setCurrentSlide((prev) => (prev === 0 ? slides.length - 1 : prev - 1));
    setSelectedLocation(
      slides[currentSlide === 0 ? slides.length - 1 : currentSlide - 1]
        .locationId,
    );
    setIsAutoPlaying(false);
  };

  // Autoplay functionality
  useEffect(() => {
    if (!isAutoPlaying) return;

    const interval = setInterval(() => {
      setCurrentSlide((prev) => {
        const newSlide = prev === slides.length - 1 ? 0 : prev + 1;
        setSelectedLocation(slides[newSlide].locationId);
        return newSlide;
      });
    }, autoplayInterval);

    return () => clearInterval(interval);
  }, [isAutoPlaying, autoplayInterval, slides]);

  // Resume autoplay after user inactivity
  useEffect(() => {
    if (isAutoPlaying) return;

    const timeout = setTimeout(() => {
      setIsAutoPlaying(true);
    }, 10000); // Resume autoplay after 10 seconds of inactivity

    return () => clearTimeout(timeout);
  }, [isAutoPlaying, currentSlide]);

  return (
    <div className="relative w-full h-[100vh] min-h-[700px] bg-gray-900 overflow-hidden">
      {/* Background Slides */}
      {slides.map((slide, index) => (
        <div
          key={slide.id}
          className={`absolute inset-0 transition-opacity duration-1000 ${index === currentSlide ? "opacity-100" : "opacity-0"}`}
        >
          <div
            className="absolute inset-0 bg-cover bg-center"
            style={{ backgroundImage: `url(${slide.image})` }}
          />
          <div className="absolute inset-0 bg-black bg-opacity-50" />
        </div>
      ))}

      {/* Content */}
      <div className="relative h-full flex flex-col justify-center items-center text-white px-4 z-10">
        <div className="max-w-5xl mx-auto text-center mb-8">
          <div className="inline-block bg-black/30 backdrop-blur-md px-6 py-2 rounded-full mb-8 animate-pulse-slow border border-white/20">
            <span className="text-sm md:text-base font-medium tracking-wider">
              PLUS DE 42 CLUBS AU MAROC
            </span>
          </div>

          <div className="overflow-hidden mb-2">
            <TextReveal
              text={slides[currentSlide].title}
              as="h1"
              className="text-6xl md:text-8xl font-black mb-2"
              revealDelay={300}
            />
          </div>

          <div className="overflow-hidden mb-8">
            <div
              className="animate-text-reveal"
              style={{ animationDelay: "600ms" }}
            >
              <GradientText
                gradient="from-orange-500 via-teal-400 to-orange-500"
                animate={true}
                className="text-6xl md:text-7xl font-black"
              >
                CITY<span className="text-teal-400">CLUB</span>
                <span className="text-orange-500 text-xs align-super">+</span>
              </GradientText>
            </div>
          </div>

          <div className="overflow-hidden mb-10">
            <TextReveal
              text={slides[currentSlide].subtitle}
              as="p"
              className="text-xl md:text-2xl max-w-2xl mx-auto font-light"
              revealDelay={900}
            />
          </div>

          <div className="flex flex-col sm:flex-row justify-center gap-4">
            <MagneticButton
              strength={20}
              className="bg-gradient-to-r from-orange-500 to-orange-600 text-white font-bold py-6 px-10 rounded-xl relative overflow-hidden group transition-all duration-300 hover:shadow-xl hover:shadow-orange-500/30 hover:scale-105 text-lg"
              onClick={() => (window.location.href = "#membership")}
            >
              <span className="relative z-10 flex items-center">
                REJOIGNEZ-NOUS <span className="ml-2">→</span>
              </span>
              <span className="absolute top-0 -left-[100%] w-[120%] h-full bg-gradient-to-r from-transparent via-white/20 to-transparent skew-x-[25deg] animate-[glint_3s_ease-in-out_infinite_alternate]"></span>
            </MagneticButton>

            <MagneticButton
              strength={20}
              className="backdrop-blur-md bg-white/10 border-2 border-white/50 text-white hover:bg-white hover:text-gray-900 font-bold py-6 px-10 rounded-xl transition-all duration-300 hover:shadow-lg hover:shadow-white/30 hover:scale-105 text-lg"
              onClick={() => (window.location.href = "#classes")}
            >
              <span className="relative z-10 flex items-center">
                NOS COURS <span className="ml-2">→</span>
              </span>
            </MagneticButton>
          </div>
        </div>

        {/* Location Selector */}
        <div className="absolute bottom-16 left-0 right-0 mx-auto max-w-3xl px-4">
          <LocationSelector
            selectedLocation={selectedLocation}
            onLocationChange={handleLocationChange}
            className="bg-white/90 backdrop-blur-sm"
          />
        </div>
      </div>

      {/* Navigation Arrows */}
      <button
        className="absolute left-6 top-1/2 transform -translate-y-1/2 bg-white/10 backdrop-blur-sm hover:bg-orange-500 text-white p-3 rounded-full z-20 transition-all duration-300 hover:scale-110 hover:shadow-lg hover:shadow-orange-500/50 border border-white/20"
        onClick={prevSlide}
        aria-label="Previous slide"
      >
        <ChevronLeft size={24} />
      </button>
      <button
        className="absolute right-6 top-1/2 transform -translate-y-1/2 bg-white/10 backdrop-blur-sm hover:bg-orange-500 text-white p-3 rounded-full z-20 transition-all duration-300 hover:scale-110 hover:shadow-lg hover:shadow-orange-500/50 border border-white/20"
        onClick={nextSlide}
        aria-label="Next slide"
      >
        <ChevronRight size={24} />
      </button>

      {/* Slide Indicators */}
      <div className="absolute bottom-40 left-0 right-0 flex justify-center gap-3 z-20">
        {slides.map((_, index) => (
          <button
            key={index}
            className={`h-3 rounded-full transition-all ${index === currentSlide ? "bg-orange-500 w-8 shadow-lg shadow-orange-500/50" : "bg-white/30 w-3 hover:bg-white/60"}`}
            onClick={() => {
              setCurrentSlide(index);
              setSelectedLocation(slides[index].locationId);
              setIsAutoPlaying(false);
            }}
            aria-label={`Go to slide ${index + 1}`}
          />
        ))}
      </div>
    </div>
  );
};

export default HeroSection;
