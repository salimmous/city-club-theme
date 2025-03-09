import React from "react";
import { Star } from "lucide-react";
import {
  Carousel,
  CarouselContent,
  CarouselItem,
  CarouselNext,
  CarouselPrevious,
} from "./ui/carousel";
import "./TestimonialCarousel.css";

interface TestimonialProps {
  image: string;
  quote: string;
  name: string;
  duration: string;
  rating: number;
}

interface TestimonialCarouselProps {
  testimonials?: TestimonialProps[];
}

const defaultTestimonials: TestimonialProps[] = [
  {
    image: "https://api.dicebear.com/7.x/avataaars/svg?seed=john",
    quote:
      "Rejoindre ce club de fitness a été la meilleure décision que j'ai prise cette année. Les entraîneurs sont exceptionnels et les installations sont de premier ordre!",
    name: "Ahmed Benali",
    duration: "Membre depuis 6 mois",
    rating: 5,
  },
  {
    image: "https://api.dicebear.com/7.x/avataaars/svg?seed=sarah",
    quote:
      "J'ai essayé de nombreuses salles de sport à Casablanca, mais celle-ci se démarque. La variété des cours me motive et j'ai vu des résultats incroyables.",
    name: "Fatima Zahra",
    duration: "Membre depuis 1 an",
    rating: 5,
  },
  {
    image: "https://api.dicebear.com/7.x/avataaars/svg?seed=mike",
    quote:
      "Le programme d'entraînement personnel m'a aidé à atteindre mes objectifs de fitness plus rapidement que prévu. Je recommande vivement!",
    name: "Youssef El Mansouri",
    duration: "Membre depuis 3 mois",
    rating: 4,
  },
  {
    image: "https://api.dicebear.com/7.x/avataaars/svg?seed=lisa",
    quote:
      "En tant que professionnelle occupée, j'apprécie les horaires flexibles et les multiples emplacements. Cela rend le maintien de la forme physique beaucoup plus facile.",
    name: "Leila Amrani",
    duration: "Membre depuis 9 mois",
    rating: 5,
  },
  {
    image: "https://api.dicebear.com/7.x/avataaars/svg?seed=david",
    quote:
      "L'aspect communautaire de ce club est ce qui me fait revenir. Excellente ambiance et membres solidaires!",
    name: "Karim Tazi",
    duration: "Membre depuis 2 ans",
    rating: 5,
  },
];

const TestimonialCard: React.FC<TestimonialProps> = ({
  image,
  quote,
  name,
  duration,
  rating,
}) => {
  return (
    <div className="testimonial-card">
      <div className="testimonial-header">
        <div className="testimonial-avatar">
          <img src={image} alt={name} />
        </div>
        <div className="testimonial-info">
          <h3>{name}</h3>
          <p>{duration}</p>
          <div className="testimonial-stars">
            {Array.from({ length: 5 }).map((_, i) => (
              <Star
                key={i}
                size={16}
                className={
                  i < rating
                    ? "text-yellow-500 fill-yellow-500"
                    : "text-gray-300"
                }
              />
            ))}
          </div>
        </div>
      </div>
      <blockquote className="testimonial-quote">{quote}</blockquote>
    </div>
  );
};

const TestimonialCarousel: React.FC<TestimonialCarouselProps> = ({
  testimonials = defaultTestimonials,
}) => {
  return (
    <div className="bg-gray-100 p-6 rounded-xl">
      <Carousel
        opts={{
          align: "start",
          loop: true,
        }}
        className="w-full"
      >
        <CarouselContent>
          {testimonials.map((testimonial, index) => (
            <CarouselItem key={index} className="md:basis-1/2 lg:basis-1/3">
              <TestimonialCard {...testimonial} />
            </CarouselItem>
          ))}
        </CarouselContent>
        <div className="carousel-controls">
          <CarouselPrevious className="static translate-y-0" />
          <CarouselNext className="static translate-y-0" />
        </div>
      </Carousel>
    </div>
  );
};

export default TestimonialCarousel;
