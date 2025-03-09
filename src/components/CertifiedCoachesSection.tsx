import React from "react";
import { Award, Check, Users } from "lucide-react";

interface CoachBenefit {
  title: string;
  description: string;
  icon: React.ReactNode;
}

interface CertifiedCoachesSectionProps {
  count?: string;
  title?: string;
  description?: string;
  benefits?: CoachBenefit[];
  image?: string;
}

const CertifiedCoachesSection: React.FC<CertifiedCoachesSectionProps> = ({
  count = "600",
  title = "COACHS CERTIFIÉS",
  description = "Nos coachs certifiés possèdent une expertise approfondie dans divers domaines du fitness et de la santé. Ils sont dédiés à fournir un entraînement personnalisé et efficace, adapté à vos objectifs personnels, que ce soit pour perdre du poids, gagner en force, améliorer votre condition physique ou simplement mener une vie plus saine.",
  benefits = [
    {
      title: "FORMATIONS CONTINUES",
      description:
        "Nos coachs suivent 8 formations par an pour vous accompagner",
      icon: <Award className="h-6 w-6 text-orange-500" />,
    },
    {
      title: "COACHS SPÉCIALISÉS",
      description: "Faites vous coacher par activité selon vos objectifs",
      icon: <Users className="h-6 w-6 text-orange-500" />,
    },
    {
      title: "CONSEILS DIÉTÉTIQUES",
      description: "Faites vous conseiller par des experts de la nutrition",
      icon: <Check className="h-6 w-6 text-orange-500" />,
    },
    {
      title: "COACHS POUR LES 100% FEMMES",
      description: "Des coachs femmes pour des centres City Lady 100% femmes",
      icon: <Users className="h-6 w-6 text-orange-500" />,
    },
    {
      title: "SUIVIS PERSONNALISÉS",
      description: "Nos programmes s'adaptent aux besoins de chaque adhérent",
      icon: <Check className="h-6 w-6 text-orange-500" />,
    },
    {
      title: "ÉVALUATIONS & PLANIFICATIONS",
      description:
        "Nos Coachs et nutritionnistes veillent à vous suivre de très près",
      icon: <Award className="h-6 w-6 text-orange-500" />,
    },
  ],
  image = "https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=800&q=80",
}) => {
  return (
    <section className="py-24 bg-white">
      <div className="container mx-auto px-4">
        <div className="flex flex-col lg:flex-row items-center gap-12">
          <div className="w-full lg:w-1/2">
            <div className="relative">
              <div className="absolute -top-4 -left-4 w-full h-full border-2 border-orange-400 rounded-xl animate-pulse-slow"></div>
              <img
                src={image}
                alt="Certified Coach"
                className="rounded-xl w-full h-auto shadow-xl relative z-10 transition-all duration-500 hover:scale-[1.02] hover:shadow-2xl"
              />
              <div className="absolute -bottom-6 -right-6 bg-orange-500 text-white p-4 rounded-lg shadow-lg z-20 animate-float">
                <p className="font-bold text-xl">CERTIFIÉS</p>
              </div>
            </div>
          </div>

          <div className="w-full lg:w-1/2">
            <div className="inline-block bg-orange-500/10 px-4 py-1 rounded-full mb-4">
              <span className="text-sm font-medium tracking-wider text-orange-600">
                EXPERTISE PROFESSIONNELLE
              </span>
            </div>
            <div className="flex items-baseline mb-6">
              <span className="text-6xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-orange-500 to-orange-600">
                {count}
                <span className="text-3xl">+</span>
              </span>
            </div>
            <h2 className="text-4xl md:text-5xl font-bold text-gray-900 mb-6 tracking-tight">
              {title}
            </h2>
            <p className="text-gray-600 mb-10 text-lg leading-relaxed">
              {description}
            </p>

            <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
              {benefits.map((benefit, index) => (
                <div
                  key={index}
                  className="flex items-start group hover:translate-x-1 transition-all duration-300"
                >
                  <div className="flex-shrink-0 mr-4 mt-1 bg-orange-500/10 p-2 rounded-lg group-hover:bg-orange-500/20 transition-colors duration-300">
                    {benefit.icon}
                  </div>
                  <div>
                    <h3 className="font-bold text-gray-800 mb-1">
                      {benefit.title}
                    </h3>
                    <p className="text-gray-600">{benefit.description}</p>
                  </div>
                </div>
              ))}
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};

export default CertifiedCoachesSection;
