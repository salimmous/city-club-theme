import React from "react";
import { Clipboard, Activity, CheckCircle } from "lucide-react";
import { Button } from "./ui/button";
import { MagneticButton } from "./ui/magnetic-button";
import { RevealOnScroll } from "./ui/reveal-on-scroll";
import { TextReveal } from "./ui/text-reveal";

interface Step {
  number: string;
  title: string;
  description: string;
  icon: React.ReactNode;
  color: string;
}

interface MedicalAssessmentSectionProps {
  title?: string;
  subtitle?: string;
  steps?: Step[];
  image?: string;
  ctaText?: string;
}

const MedicalAssessmentSection: React.FC<MedicalAssessmentSectionProps> = ({
  title = "BILAN MÉDICO-SPORTIF",
  subtitle = "Reprenez en main votre santé avec le bilan médico-sportif",
  steps = [
    {
      number: "1",
      title: "DEMANDEZ VOTRE BILAN",
      description:
        "Approchez votre coach dans l'espace dédié au Bilan Médico-Sportif et demandez de remplir votre planning de réservation digitalisé.",
      icon: <Clipboard className="h-6 w-6" />,
      color: "bg-orange-400",
    },
    {
      number: "2",
      title: "PASSEZ VOS TESTS",
      description:
        "En vous faisant assister et évaluer par le coach, passez l'ensemble des tests physiques chronométrés du programme.",
      icon: <Activity className="h-6 w-6" />,
      color: "bg-orange-500",
    },
    {
      number: "3",
      title: "RECEVEZ VOTRE PROGRAMME",
      description:
        "Sur la base des résultats de votre test médico-sportif, recevez vos programmes personnalisés sur place et par email.",
      icon: <CheckCircle className="h-6 w-6" />,
      color: "bg-orange-600",
    },
  ],
  image = "https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=800&q=80",
  ctaText = "DEMANDER UN BILAN",
}) => {
  return (
    <section className="py-24 relative overflow-hidden bg-gradient-to-r from-gray-900 to-gray-800 dark:from-gray-950 dark:to-gray-900">
      {/* Background overlay with image */}
      <div className="absolute inset-0 mix-blend-overlay opacity-10">
        <img
          src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=1920&q=80"
          alt=""
          className="w-full h-full object-cover"
        />
      </div>

      <div className="container mx-auto px-4 relative z-10">
        <div className="flex flex-col lg:flex-row items-center gap-16">
          {/* Image Column */}
          <div className="w-full lg:w-1/2 order-2 lg:order-1">
            <div className="relative rounded-2xl overflow-hidden shadow-2xl border border-gray-700">
              <img
                src={image}
                alt="Medical Assessment"
                className="w-full h-auto"
              />
              <div className="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
            </div>
          </div>

          {/* Content Column */}
          <div className="w-full lg:w-1/2 order-1 lg:order-2 text-white">
            <RevealOnScroll direction="up" delay={100}>
              <div className="inline-block bg-orange-500/20 px-4 py-1 rounded-full mb-4 border border-orange-500/30">
                <span className="text-sm font-medium tracking-wider text-orange-400">
                  PROGRAMME EXCLUSIF
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
              <p className="text-lg mb-10 font-light text-gray-300 max-w-xl">
                {subtitle}
              </p>
            </RevealOnScroll>

            {/* Steps */}
            <div className="space-y-6">
              {steps.map((step, index) => (
                <div key={index} className="flex items-start gap-4 group">
                  <div
                    className={`${step.color} rounded-full p-4 flex-shrink-0 transition-all duration-300 group-hover:scale-110`}
                  >
                    {step.icon}
                  </div>
                  <div>
                    <h3 className="text-lg font-bold mb-2">{step.title}</h3>
                    <p className="text-gray-300 text-sm">{step.description}</p>
                  </div>
                </div>
              ))}
            </div>

            <RevealOnScroll direction="up" delay={800}>
              <Button
                className="mt-10 bg-orange-500 hover:bg-orange-600 text-white px-8 py-4 text-lg font-bold shadow-lg shadow-orange-500/30 transition-all duration-300 hover:scale-105 rounded-lg btn-primary"
                size="lg"
              >
                {ctaText}
              </Button>
            </RevealOnScroll>
          </div>
        </div>
      </div>
    </section>
  );
};

export default MedicalAssessmentSection;
