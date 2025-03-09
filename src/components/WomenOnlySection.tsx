import React from "react";
import { Heart, Shield, Users } from "lucide-react";
import { Button } from "./ui/button";

interface Benefit {
  title: string;
  description: string;
  icon: React.ReactNode;
}

interface WomenOnlySectionProps {
  title?: string;
  subtitle?: string;
  description?: string;
  benefits?: Benefit[];
  image?: string;
  ctaText?: string;
}

const WomenOnlySection: React.FC<WomenOnlySectionProps> = ({
  title = "CITY LADY",
  subtitle = "ESPACE 100% FEMMES",
  description = "City Club propose un espace entièrement dédié aux femmes, offrant un environnement confortable et privé pour s'entraîner. Nos centres City Lady sont conçus pour répondre aux besoins spécifiques des femmes avec des équipements adaptés et des coachs féminines qualifiées.",
  benefits = [
    {
      title: "Environnement Privé",
      description:
        "Un espace exclusivement féminin pour s'entraîner en toute tranquillité",
      icon: <Shield className="h-6 w-6 text-pink-500" />,
    },
    {
      title: "Coachs Féminines",
      description:
        "Des professionnelles qualifiées pour vous accompagner dans votre parcours fitness",
      icon: <Users className="h-6 w-6 text-pink-500" />,
    },
    {
      title: "Programmes Spécifiques",
      description:
        "Des entraînements conçus pour répondre aux objectifs et besoins des femmes",
      icon: <Heart className="h-6 w-6 text-pink-500" />,
    },
  ],
  image = "https://images.unsplash.com/photo-1518611012118-696072aa579a?w=800&q=80",
  ctaText = "DÉCOUVRIR CITY LADY",
}) => {
  return (
    <section className="py-24 bg-gradient-to-r from-pink-100 to-pink-200 relative overflow-hidden">
      <div className="absolute top-0 right-0 w-96 h-96 bg-pink-300 rounded-full opacity-20 -mr-32 -mt-32 blur-2xl animate-pulse-slow"></div>
      <div className="absolute bottom-0 left-0 w-96 h-96 bg-pink-300 rounded-full opacity-20 -ml-32 -mb-32 blur-2xl animate-pulse-slow"></div>
      <div className="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1518611012118-696072aa579a?w=1920&q=80')] opacity-5 bg-cover bg-fixed mix-blend-overlay"></div>
      <div className="container mx-auto px-4">
        <div className="flex flex-col lg:flex-row items-center gap-12">
          <div className="w-full lg:w-1/2 order-2 lg:order-1">
            <div className="inline-block bg-pink-500 text-white px-4 py-1 rounded-full mb-4">
              <span className="text-sm font-medium tracking-wider">
                {subtitle}
              </span>
            </div>
            <h2 className="text-4xl md:text-5xl font-bold text-gray-900 mb-6 tracking-tight">
              <span className="relative inline-block">
                <span className="relative z-10">{title}</span>
                <span className="absolute bottom-2 left-0 w-full h-3 bg-pink-500/20 -z-10"></span>
              </span>
            </h2>
            <p className="text-gray-600 mb-10 text-lg leading-relaxed max-w-xl">
              {description}
            </p>

            <div className="space-y-6 mb-8">
              {benefits.map((benefit, index) => (
                <div key={index} className="flex items-start">
                  <div className="flex-shrink-0 mr-4 bg-gradient-to-br from-pink-500 to-pink-600 p-4 rounded-full shadow-md animate-float text-white">
                    {benefit.icon}
                  </div>
                  <div>
                    <h3 className="font-bold text-gray-800 text-lg mb-1">
                      {benefit.title}
                    </h3>
                    <p className="text-gray-600">{benefit.description}</p>
                  </div>
                </div>
              ))}
            </div>

            <Button className="bg-gradient-to-r from-pink-500 to-pink-600 text-white font-bold relative overflow-hidden group shadow-lg shadow-pink-500/30 transition-all duration-300 hover:scale-105 px-8 py-6 text-lg rounded-xl">
              <span className="relative z-10">{ctaText}</span>
              <span className="absolute inset-0 bg-gradient-to-r from-pink-600 to-pink-400 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
            </Button>
          </div>

          <div className="w-full lg:w-1/2 order-1 lg:order-2">
            <div className="relative">
              <div className="absolute -top-4 -right-4 w-full h-full border-2 border-pink-400 rounded-lg animate-pulse-slow"></div>
              <img
                src={image}
                alt="Women Only Fitness"
                className="rounded-lg w-full h-auto relative z-10 shadow-xl transition-all duration-500 hover:scale-[1.02] hover:shadow-2xl"
              />
              <div className="absolute -bottom-6 -left-6 bg-pink-500 text-white p-4 rounded-lg shadow-lg z-20 animate-float">
                <p className="font-bold text-xl">100% FEMMES</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};

export default WomenOnlySection;
