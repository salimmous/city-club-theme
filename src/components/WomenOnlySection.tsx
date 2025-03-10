import React from "react";
import { Heart, Shield, Users } from "lucide-react";
import { Button } from "./ui/button";
import { RevealOnScroll } from "./ui/reveal-on-scroll";
import { TextReveal } from "./ui/text-reveal";

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
      icon: <Shield className="h-6 w-6 text-white" />,
    },
    {
      title: "Coachs Féminines",
      description:
        "Des professionnelles qualifiées pour vous accompagner dans votre parcours fitness",
      icon: <Users className="h-6 w-6 text-white" />,
    },
    {
      title: "Programmes Spécifiques",
      description:
        "Des entraînements conçus pour répondre aux objectifs et besoins des femmes",
      icon: <Heart className="h-6 w-6 text-white" />,
    },
  ],
  image = "https://images.unsplash.com/photo-1518611012118-696072aa579a?w=800&q=80",
  ctaText = "DÉCOUVRIR CITY LADY",
}) => {
  return (
    <section className="py-24 relative overflow-hidden bg-gradient-to-r from-pink-900 to-pink-800 dark:from-pink-950 dark:to-pink-900 text-white">
      {/* Background overlay with image */}
      <div className="absolute inset-0 mix-blend-overlay opacity-10">
        <img
          src="https://images.unsplash.com/photo-1518611012118-696072aa579a?w=1920&q=80"
          alt=""
          className="w-full h-full object-cover"
        />
      </div>

      <div className="container mx-auto px-4 relative z-10">
        <div className="flex flex-col lg:flex-row items-center gap-16">
          {/* Content Column */}
          <div className="w-full lg:w-1/2 order-2 lg:order-1">
            <RevealOnScroll direction="up" delay={100}>
              <div className="inline-block bg-pink-500/20 px-4 py-1 rounded-full mb-4 border border-pink-500/30">
                <span className="text-sm font-medium tracking-wider text-pink-300">
                  {subtitle}
                </span>
              </div>
            </RevealOnScroll>

            <TextReveal
              text={title}
              as="h2"
              className="text-4xl md:text-5xl font-black mb-6 leading-tight tracking-tight"
              revealDelay={300}
            />

            <RevealOnScroll direction="up" delay={500}>
              <p className="text-lg mb-10 font-light text-pink-100 max-w-xl">
                {description}
              </p>
            </RevealOnScroll>

            {/* Benefits */}
            <div className="space-y-6">
              {benefits.map((benefit, index) => (
                <div key={index} className="flex items-start gap-4 group">
                  <div
                    className={`bg-pink-500 rounded-full p-4 flex-shrink-0 transition-all duration-300 group-hover:scale-110`}
                  >
                    {benefit.icon}
                  </div>
                  <div>
                    <h3 className="text-lg font-bold mb-2">{benefit.title}</h3>
                    <p className="text-pink-100 text-sm">
                      {benefit.description}
                    </p>
                  </div>
                </div>
              ))}
            </div>

            <RevealOnScroll direction="up" delay={800}>
              <Button
                className="mt-10 bg-pink-500 hover:bg-pink-600 text-white px-8 py-4 text-lg font-bold shadow-lg shadow-pink-500/30 transition-all duration-300 hover:scale-105 rounded-lg"
                size="lg"
              >
                {ctaText}
              </Button>
            </RevealOnScroll>
          </div>

          {/* Image Column */}
          <div className="w-full lg:w-1/2 order-1 lg:order-2">
            <div className="relative rounded-2xl overflow-hidden shadow-2xl border border-pink-700">
              <img
                src={image}
                alt="Women Only Fitness"
                className="w-full h-auto"
              />
              <div className="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
              <div className="absolute bottom-4 left-4 bg-pink-500 text-white px-4 py-2 rounded-lg shadow-lg">
                <p className="font-bold">100% FEMMES</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};

export default WomenOnlySection;
