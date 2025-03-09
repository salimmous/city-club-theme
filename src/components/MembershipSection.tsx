import React from "react";
import { Dumbbell, Users, Award } from "lucide-react";
import PricingTable from "./PricingTable";
import "./MembershipSection.css";

interface MembershipSectionProps {
  title?: string;
  subtitle?: string;
  backgroundColor?: string;
  showComparison?: boolean;
}

const MembershipSection: React.FC<MembershipSectionProps> = ({
  title = "Nos Abonnements",
  subtitle = "Rejoignez une communauté de plus de 230.000 adhérents actifs",
  backgroundColor = "bg-gray-50",
  showComparison = false,
}) => {
  const benefits = [
    {
      icon: <Dumbbell className="h-10 w-10 text-orange-500" />,
      title: "Équipement de Pointe",
      description:
        "Accédez à des équipements fitness premium dans tous nos clubs à travers le Maroc.",
    },
    {
      icon: <Users className="h-10 w-10 text-teal-500" />,
      title: "Coachs Experts",
      description:
        "Travaillez avec des professionnels certifiés dédiés à vous aider à atteindre vos objectifs.",
    },
    {
      icon: <Award className="h-10 w-10 text-orange-500" />,
      title: "Avantages Exclusifs",
      description:
        "Profitez d'avantages exclusifs, y compris des réductions chez nos partenaires et des événements spéciaux.",
    },
  ];

  return (
    <section className={`py-24 ${backgroundColor}`} id="memberships">
      <div className="container mx-auto px-4">
        <div className="text-center mb-16">
          <div className="flex items-center justify-center mb-4">
            <div className="h-1 w-12 bg-orange-500 rounded-full"></div>
            <div className="h-1 w-1 bg-orange-500 rounded-full mx-1"></div>
            <div className="h-1 w-1 bg-orange-500 rounded-full"></div>
          </div>
          <h2 className="text-4xl md:text-5xl font-bold text-gray-900 mb-4 tracking-tight">
            <span className="relative inline-block">
              <span className="relative z-10">{title.split(" ")[0]}</span>
              <span className="absolute bottom-2 left-0 w-full h-3 bg-orange-500/20 -z-10"></span>
            </span>{" "}
            {title.split(" ").slice(1).join(" ")}
          </h2>
          <p className="text-xl text-gray-600 max-w-3xl mx-auto">{subtitle}</p>
        </div>

        {/* Benefits Section */}
        <div className="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
          {benefits.map((benefit, index) => (
            <div
              key={index}
              className="benefit-card group hover:scale-105 transition-all duration-300"
            >
              <div className="absolute inset-0 bg-gradient-to-br from-orange-500/10 to-teal-500/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-lg"></div>
              <div className="benefit-icon relative z-10 group-hover:scale-110 transition-transform duration-300">
                {benefit.icon}
              </div>
              <h3 className="benefit-title relative z-10">{benefit.title}</h3>
              <p className="benefit-description relative z-10">
                {benefit.description}
              </p>
            </div>
          ))}
        </div>

        {/* Pricing Table Component */}
        <PricingTable showComparison={showComparison} />

        {/* Call to Action */}
        <div className="mt-16 text-center">
          <div className="cta-container">
            <h3 className="cta-title">
              Vous ne savez pas quel forfait vous convient ?
            </h3>
            <p className="cta-description">
              Visitez n'importe lequel de nos clubs pour une visite gratuite et
              une consultation avec nos conseillers d'adhésion. Nous vous
              aiderons à trouver la formule parfaite pour vos objectifs de
              fitness et votre budget.
            </p>
            <div className="cta-buttons">
              <button className="cta-button-primary">
                PROGRAMMER UNE VISITE
              </button>
              <button className="cta-button-secondary">CONTACTEZ-NOUS</button>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};

export default MembershipSection;
