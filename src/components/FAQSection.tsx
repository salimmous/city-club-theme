import React from "react";
import {
  Accordion,
  AccordionContent,
  AccordionItem,
  AccordionTrigger,
} from "./ui/accordion";

interface FAQItem {
  question: string;
  answer: string;
}

interface FAQSectionProps {
  title?: string;
  faqs?: FAQItem[];
}

const FAQSection: React.FC<FAQSectionProps> = ({
  title = "FOIRE AUX QUESTIONS !",
  faqs = [
    {
      question: "Avez-Vous Un Espace 100% Femmes ?",
      answer:
        "Oui, City Club propose un espace entièrement dédié aux femmes, offrant un environnement confortable et privé pour s'entraîner.",
    },
    {
      question: "Quels Sont Vos Horaires D'ouverture ?",
      answer:
        "Nos clubs sont ouverts du lundi au vendredi de 6h à 22h et le weekend de 8h à 20h. Certains de nos emplacements premium offrent un accès 24h/7j.",
    },
    {
      question: "Offrez-Vous Des Programmes D'entraînement Personnalisés ?",
      answer:
        "Absolument ! Nos coachs certifiés créent des programmes d'entraînement sur mesure adaptés à vos objectifs spécifiques, qu'il s'agisse de perte de poids, de gain musculaire ou d'amélioration de votre condition physique générale.",
    },
    {
      question: "Quels Types D'équipements Proposez-Vous ?",
      answer:
        "Nos clubs sont équipés de machines cardio et de musculation de dernière génération, d'espaces de poids libres, de zones fonctionnelles, et de studios pour les cours collectifs. Nous mettons régulièrement à jour notre équipement pour vous offrir la meilleure expérience d'entraînement.",
    },
    {
      question: "Avez-Vous Des Piscines Et Des Terrains ?",
      answer:
        "Certains de nos clubs premium disposent de piscines, de terrains de squash, et d'autres installations sportives. Consultez la page de votre club local pour connaître les équipements spécifiques disponibles.",
    },
    {
      question: "Comment Puis-je M'inscrire ?",
      answer:
        "Vous pouvez vous inscrire directement dans l'un de nos clubs, sur notre site web, ou via notre application mobile. Nous proposons différentes formules d'abonnement pour répondre à vos besoins et à votre budget.",
    },
    {
      question: "Proposez-vous des cours collectifs ?",
      answer:
        "Oui, nous offrons une large gamme de cours collectifs comme le yoga, le pilates, le cycling, la zumba, le body pump et bien d'autres. Consultez notre planning de cours pour plus de détails.",
    },
    {
      question: "Y a-t-il une période d'engagement minimum ?",
      answer:
        "Nous proposons différentes formules avec ou sans engagement. Vous pouvez choisir un abonnement mensuel sans engagement ou opter pour un abonnement annuel à tarif préférentiel.",
    },
  ],
}) => {
  return (
    <section className="py-16 bg-gray-50">
      <div className="container mx-auto px-4">
        <div className="text-center mb-12">
          <h2 className="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
            {title}
          </h2>
        </div>

        <div className="max-w-3xl mx-auto">
          <Accordion type="single" collapsible className="w-full">
            {faqs.map((faq, index) => (
              <AccordionItem key={index} value={`item-${index}`}>
                <AccordionTrigger className="text-left font-semibold text-lg">
                  {faq.question}
                </AccordionTrigger>
                <AccordionContent className="text-gray-600">
                  {faq.answer}
                </AccordionContent>
              </AccordionItem>
            ))}
          </Accordion>
        </div>

        <div className="text-center mt-12">
          <p className="text-gray-600 mb-6">
            Vous ne trouvez pas la réponse à votre question ?
          </p>
          <button className="bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 px-6 rounded-lg transition-all duration-300 shadow-lg hover:shadow-orange-500/30 hover:scale-105 relative overflow-hidden group">
            <span className="relative z-10">
              CONTACTER UN REPRÉSENTANT CITY CLUB
            </span>
            <span className="absolute inset-0 bg-gradient-to-r from-orange-600 to-orange-400 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
          </button>
        </div>
      </div>
    </section>
  );
};

export default FAQSection;
