import React, { useState } from "react";
import { Check, X, HelpCircle } from "lucide-react";
import {
  Card,
  CardHeader,
  CardTitle,
  CardContent,
  CardFooter,
} from "./ui/card";
import { Button } from "./ui/button";
import { Badge } from "./ui/badge";
import { Switch } from "./ui/switch";
import {
  Tooltip,
  TooltipContent,
  TooltipProvider,
  TooltipTrigger,
} from "./ui/tooltip";

interface PricingFeature {
  name: string;
  basic: boolean;
  premium: boolean;
  elite: boolean;
  description?: string;
}

interface PricingPlan {
  name: string;
  price: number;
  period: string;
  description: string;
  features: string[];
  highlighted?: boolean;
  badge?: string;
}

interface PricingTableProps {
  plans?: PricingPlan[];
  features?: PricingFeature[];
  showComparison?: boolean;
}

const defaultPlans: PricingPlan[] = [
  {
    name: "Basic",
    price: 299,
    period: "mois",
    description:
      "Parfait pour les débutants et les passionnés de fitness occasionnels",
    features: [
      "Access to main gym area",
      "Standard equipment usage",
      "2 group classes per week",
      "Locker access",
    ],
  },
  {
    name: "Premium",
    price: 499,
    period: "mois",
    description:
      "Idéal pour les passionnés de fitness réguliers qui recherchent plus",
    features: [
      "Full gym access",
      "All equipment usage",
      "Unlimited group classes",
      "Locker with towel service",
      "1 personal training session monthly",
      "Nutrition consultation",
    ],
    highlighted: true,
    badge: "Plus Populaire",
  },
  {
    name: "Elite",
    price: 799,
    period: "mois",
    description: "L'expérience fitness ultime pour les athlètes dédiés",
    features: [
      "24/7 access to all locations",
      "Premium equipment priority",
      "Unlimited group classes",
      "Premium locker with laundry service",
      "4 personal training sessions monthly",
      "Advanced nutrition planning",
      "Spa access",
      "Guest passes (2 per month)",
    ],
  },
];

const defaultFeatures: PricingFeature[] = [
  { name: "Gym Access", basic: true, premium: true, elite: true },
  { name: "Cardio Equipment", basic: true, premium: true, elite: true },
  { name: "Strength Equipment", basic: true, premium: true, elite: true },
  {
    name: "Group Classes",
    basic: false,
    premium: true,
    elite: true,
    description: "Access to instructor-led fitness classes",
  },
  {
    name: "Personal Training",
    basic: false,
    premium: true,
    elite: true,
    description: "One-on-one sessions with certified trainers",
  },
  { name: "Nutrition Consultation", basic: false, premium: true, elite: true },
  { name: "Towel Service", basic: false, premium: true, elite: true },
  { name: "Locker Access", basic: true, premium: true, elite: true },
  { name: "Sauna & Steam Room", basic: false, premium: false, elite: true },
  { name: "Swimming Pool", basic: false, premium: false, elite: true },
  {
    name: "Multi-Location Access",
    basic: false,
    premium: false,
    elite: true,
    description: "Use your membership at any of our locations",
  },
  {
    name: "Guest Passes",
    basic: false,
    premium: false,
    elite: true,
    description: "Bring friends to work out with you",
  },
  { name: "Premium App Features", basic: false, premium: true, elite: true },
  { name: "Priority Booking", basic: false, premium: false, elite: true },
  { name: "VIP Events", basic: false, premium: false, elite: true },
];

const PricingTable: React.FC<PricingTableProps> = ({
  plans = defaultPlans,
  features = defaultFeatures,
  showComparison = false,
}) => {
  const [compareFeatures, setCompareFeatures] = useState(showComparison);

  return (
    <div className="w-full max-w-7xl mx-auto px-4 py-8 bg-white">
      <div className="flex justify-between items-center mb-8">
        <h2 className="text-3xl font-bold text-gray-900">
          Options d'Abonnement
        </h2>
        <div className="flex items-center gap-2">
          <span className="text-sm font-medium text-gray-700">Vue Simple</span>
          <Switch
            checked={compareFeatures}
            onCheckedChange={setCompareFeatures}
            aria-label="Toggle comparison view"
          />
          <span className="text-sm font-medium text-gray-700">
            Comparer les Options
          </span>
        </div>
      </div>

      {!compareFeatures ? (
        // Simple pricing cards view
        <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
          {plans.map((plan, index) => (
            <Card
              key={index}
              className={`flex flex-col h-full ${plan.highlighted ? "ring-2 ring-primary shadow-lg" : ""}`}
            >
              <CardHeader className="pb-2">
                {plan.badge && (
                  <Badge className="mb-2 self-start" variant="secondary">
                    {plan.badge}
                  </Badge>
                )}
                <CardTitle className="text-2xl font-bold">
                  {plan.name}
                </CardTitle>
                <div className="mt-2">
                  <span className="text-4xl font-bold">{plan.price} MAD</span>
                  <span className="text-gray-500 ml-1">/{plan.period}</span>
                </div>
                <p className="text-sm text-gray-500 mt-2">{plan.description}</p>
              </CardHeader>
              <CardContent className="flex-grow">
                <ul className="space-y-3">
                  {plan.features.map((feature, idx) => (
                    <li key={idx} className="flex items-start">
                      <Check className="h-5 w-5 text-green-500 mr-2 flex-shrink-0 mt-0.5" />
                      <span className="text-gray-700">{feature}</span>
                    </li>
                  ))}
                </ul>
              </CardContent>
              <CardFooter>
                <Button
                  className="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold relative overflow-hidden group transition-all duration-300 hover:shadow-lg hover:shadow-orange-500/30 hover:scale-[1.02]"
                  size="lg"
                >
                  <span className="relative z-10">
                    CHOISIR {plan.name.toUpperCase()}
                  </span>
                  <span className="absolute inset-0 bg-gradient-to-r from-orange-600 to-orange-400 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                </Button>
              </CardFooter>
            </Card>
          ))}
        </div>
      ) : (
        // Detailed comparison table view
        <div className="overflow-x-auto">
          <table className="w-full border-collapse">
            <thead>
              <tr className="border-b">
                <th className="text-left p-4 w-1/4">Features</th>
                {plans.map((plan, index) => (
                  <th
                    key={index}
                    className={`p-4 text-center ${plan.highlighted ? "bg-primary/10" : ""}`}
                  >
                    <div className="flex flex-col items-center">
                      {plan.badge && (
                        <Badge className="mb-2" variant="secondary">
                          {plan.badge}
                        </Badge>
                      )}
                      <span className="text-xl font-bold">{plan.name}</span>
                      <div className="mt-1">
                        <span className="text-2xl font-bold">
                          {plan.price} MAD
                        </span>
                        <span className="text-gray-500 text-sm">
                          /{plan.period}
                        </span>
                      </div>
                    </div>
                  </th>
                ))}
              </tr>
            </thead>
            <tbody>
              {features.map((feature, index) => (
                <tr
                  key={index}
                  className={index % 2 === 0 ? "bg-gray-50" : "bg-white"}
                >
                  <td className="p-4 border-b border-gray-200">
                    <div className="flex items-center">
                      <span className="font-medium">{feature.name}</span>
                      {feature.description && (
                        <TooltipProvider>
                          <Tooltip>
                            <TooltipTrigger asChild>
                              <HelpCircle className="h-4 w-4 text-gray-400 ml-1 cursor-help" />
                            </TooltipTrigger>
                            <TooltipContent>
                              <p>{feature.description}</p>
                            </TooltipContent>
                          </Tooltip>
                        </TooltipProvider>
                      )}
                    </div>
                  </td>
                  <td
                    className={`p-4 text-center border-b border-gray-200 ${plans[0].highlighted ? "bg-primary/10" : ""}`}
                  >
                    {feature.basic ? (
                      <Check className="h-5 w-5 text-green-500 mx-auto" />
                    ) : (
                      <X className="h-5 w-5 text-gray-300 mx-auto" />
                    )}
                  </td>
                  <td
                    className={`p-4 text-center border-b border-gray-200 ${plans[1].highlighted ? "bg-primary/10" : ""}`}
                  >
                    {feature.premium ? (
                      <Check className="h-5 w-5 text-green-500 mx-auto" />
                    ) : (
                      <X className="h-5 w-5 text-gray-300 mx-auto" />
                    )}
                  </td>
                  <td
                    className={`p-4 text-center border-b border-gray-200 ${plans[2].highlighted ? "bg-primary/10" : ""}`}
                  >
                    {feature.elite ? (
                      <Check className="h-5 w-5 text-green-500 mx-auto" />
                    ) : (
                      <X className="h-5 w-5 text-gray-300 mx-auto" />
                    )}
                  </td>
                </tr>
              ))}
              <tr>
                <td className="p-4"></td>
                {plans.map((plan, index) => (
                  <td
                    key={index}
                    className={`p-4 text-center ${plan.highlighted ? "bg-primary/10" : ""}`}
                  >
                    <Button
                      className="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold relative overflow-hidden group transition-all duration-300 hover:shadow-lg hover:shadow-orange-500/30 hover:scale-[1.02]"
                      size="lg"
                    >
                      <span className="relative z-10">
                        CHOISIR {plan.name.toUpperCase()}
                      </span>
                      <span className="absolute inset-0 bg-gradient-to-r from-orange-600 to-orange-400 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                    </Button>
                  </td>
                ))}
              </tr>
            </tbody>
          </table>
        </div>
      )}
    </div>
  );
};

export default PricingTable;
