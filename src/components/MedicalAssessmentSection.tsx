import React from "react";
import { Activity, Clipboard, CheckCircle } from "lucide-react";
import { Button } from "./ui/button";
import { MagneticButton } from "./ui/magnetic-button";
import { BlobBackground } from "./ui/blob-background";
import { RevealOnScroll } from "./ui/reveal-on-scroll";
import { TextReveal } from "./ui/text-reveal";
import { MorphShape } from "./ui/morph-shape";

interface Step {
  number: string;
  title: string;
  description: string;
  icon: React.ReactNode;
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
      icon: <Clipboard className="h-6 w-6 text-white" />,
    },
    {
      number: "2",
      title: "PASSEZ VOS TESTS",
      description:
        "En vous faisant assister et évaluer par le coach, passez l'ensemble des tests physiques chronométrés du programme.",
      icon: <Activity className="h-6 w-6 text-white" />,
    },
    {
      number: "3",
      title: "RECEVEZ VOTRE PROGRAMME",
      description:
        "Sur la base des résultats de votre test médico-sportif, recevez vos programmes personnalisés sur place et par email.",
      icon: <CheckCircle className="h-6 w-6 text-white" />,
    },
  ],
  image = "https://images.unsplash.com/photo-1594381898411-846e7d193883?w=800&q=80",
  ctaText = "DEMANDER UN BILAN",
}) => {
  return (
    <section className="py-32 text-white relative overflow-hidden">
      <div className="absolute inset-0 -z-10">
        <div className="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1594381898411-846e7d193883?w=1920&q=80')] bg-cover bg-center opacity-20"></div>
        <div className="absolute inset-0 bg-gradient-to-r from-teal-900 to-teal-800"></div>
      </div>

      <BlobBackground
        className="absolute inset-0 -z-10"
        blobColors={["bg-teal-600", "bg-teal-700", "bg-orange-600"]}
        blobCount={4}
        blur="blur-3xl"
        opacity="opacity-40"
      />

      <div className="container mx-auto px-4 relative z-10">
        <div className="flex flex-col lg:flex-row items-center gap-12">
          <div className="w-full lg:w-1/2">
            <RevealOnScroll direction="up" delay={100}>
              <div className="inline-block bg-white/10 backdrop-blur-sm px-4 py-1 rounded-full mb-4 border border-white/20">
                <span className="text-sm font-medium tracking-wider">
                  PROGRAMME EXCLUSIF
                </span>
              </div>
            </RevealOnScroll>

            <TextReveal
              text={title}
              as="h2"
              className="text-5xl md:text-6xl font-black mb-6 leading-tight tracking-tight"
              revealDelay={300}
            />

            <RevealOnScroll direction="up" delay={500}>
              <p className="text-xl mb-10 font-light max-w-xl">{subtitle}</p>
            </RevealOnScroll>

            <div className="space-y-8">
              {steps.map((step, index) => (
                <RevealOnScroll
                  key={index}
                  direction="left"
                  delay={300 + index * 200}
                >
                  <div className="flex items-start bg-white/5 backdrop-blur-sm p-6 rounded-xl border border-white/10 hover:bg-white/10 transition-colors duration-300">
                    <div className="flex-shrink-0 mr-4">
                      <MorphShape
                        color="bg-gradient-to-br from-orange-500 to-orange-600"
                        size="w-14 h-14"
                        className="flex items-center justify-center shadow-lg shadow-orange-500/30"
                      >
                        <div className="flex items-center justify-center">
                          {step.icon}
                        </div>
                      </MorphShape>
                    </div>
                    <div>
                      <h3 className="text-xl font-bold flex items-center">
                        <span className="flex items-center justify-center bg-orange-500/20 text-orange-100 w-8 h-8 rounded-full mr-3">
                          {step.number}
                        </span>
                        {step.title}
                      </h3>
                      <p className="mt-2 text-teal-100">{step.description}</p>
                    </div>
                  </div>
                </RevealOnScroll>
              ))}
            </div>

            <RevealOnScroll direction="up" delay={800}>
              <MagneticButton
                className="mt-10 bg-gradient-to-r from-orange-500 to-orange-600 text-white px-10 py-6 text-lg font-bold shadow-lg shadow-orange-500/30 transition-all duration-300 hover:scale-105 rounded-xl"
                strength={30}
              >
                <span className="relative z-10">{ctaText}</span>
                <span className="absolute top-0 -left-[100%] w-[120%] h-full bg-gradient-to-r from-transparent via-white/20 to-transparent skew-x-[25deg] animate-[glint_3s_ease-in-out_infinite_alternate]"></span>
              </MagneticButton>
            </RevealOnScroll>
          </div>

          <div className="w-full lg:w-1/2">
            <RevealOnScroll direction="right" delay={400}>
              <div className="relative">
                <div className="absolute -top-4 -left-4 w-full h-full border-2 border-orange-400 rounded-xl animate-pulse-slow"></div>
                <img
                  src={image}
                  alt="Medical Assessment"
                  className="rounded-xl w-full h-auto relative z-10 shadow-xl transition-all duration-500 hover:scale-[1.02] hover:shadow-2xl"
                />
                <MorphShape
                  color="bg-orange-500"
                  size="auto"
                  className="absolute -bottom-6 -right-6 text-white p-4 shadow-lg z-20 flex items-center justify-center"
                >
                  <p className="font-bold text-xl px-2">DÈS VOTRE ARRIVÉE</p>
                </MorphShape>
              </div>
            </RevealOnScroll>
          </div>
        </div>
      </div>
    </section>
  );
};

export default MedicalAssessmentSection;
