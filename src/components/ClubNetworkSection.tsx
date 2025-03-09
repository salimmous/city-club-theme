import React from "react";
import { MapPin, Building, Users } from "lucide-react";
import { Button } from "./ui/button";

interface ClubNetworkSectionProps {
  clubCount?: string;
  memberCount?: string;
  title?: string;
  description?: string;
  mapImage?: string;
  gymImage?: string;
}

const ClubNetworkSection: React.FC<ClubNetworkSectionProps> = ({
  clubCount = "42",
  memberCount = "230.000",
  title = "CITY CLUB",
  description = "Le club de fitness le plus connu au Maroc. Disposant de machines High-Tech, de coachs certifiés et ouvert dans plus de 10 villes au Maroc.",
  mapImage = "https://images.unsplash.com/photo-1569336415962-a4bd9f69c07a?w=800&q=80",
  gymImage = "https://images.unsplash.com/photo-1540497077202-7c8a3999166f?w=800&q=80",
}) => {
  return (
    <section className="py-24 bg-gray-50">
      <div className="container mx-auto px-4">
        <div className="grid grid-cols-1 lg:grid-cols-2 gap-12">
          <div>
            <div className="inline-block bg-orange-500/10 px-4 py-1 rounded-full mb-4">
              <span className="text-sm font-medium tracking-wider text-orange-600">
                RÉSEAU NATIONAL
              </span>
            </div>
            <div className="flex items-baseline mb-6">
              <span className="text-2xl font-bold">PLUS DE</span>
              <span className="text-6xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-orange-500 to-orange-600 ml-3">
                {clubCount}
              </span>
            </div>
            <h2 className="text-4xl md:text-5xl font-bold text-gray-900 mb-6 tracking-tight">
              {title}
            </h2>
            <p className="text-gray-600 mb-10 text-lg leading-relaxed">
              {description}
            </p>

            <Button className="bg-gradient-to-r from-orange-500 to-orange-600 text-white mb-10 font-bold px-8 py-6 text-lg rounded-xl shadow-lg shadow-orange-500/20 hover:shadow-orange-500/40 transition-all duration-300 hover:scale-105">
              PROGRAMMER UNE VISITE
            </Button>

            <div className="relative border-4 border-orange-400 rounded-xl p-6 bg-white shadow-xl">
              <div className="absolute -top-5 left-6 bg-white px-4 py-1 font-bold text-gray-800 rounded-full border border-orange-400">
                VOUS RECHERCHEZ UN CLUB?
              </div>

              <div className="mt-4">
                <img
                  src={mapImage}
                  alt="Morocco Map with Club Locations"
                  className="w-full h-auto rounded-xl shadow-lg"
                />

                <div className="mt-4 flex items-center justify-between">
                  <div className="flex items-center">
                    <Building className="h-5 w-5 text-orange-500 mr-2" />
                    <span className="font-bold">{clubCount} Clubs</span>
                  </div>

                  <div className="flex items-center">
                    <Users className="h-5 w-5 text-orange-500 mr-2" />
                    <span className="font-bold">{memberCount} Adhérents</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div>
            <div className="mb-10">
              <h3 className="text-2xl font-bold mb-4">UN RÉSEAU NATIONAL DE</h3>
              <div className="flex items-baseline">
                <span className="text-3xl font-bold">PLUS DE</span>
                <span className="text-5xl font-bold text-orange-500 ml-2">
                  {clubCount} CLUBS
                </span>
              </div>
              <p className="mt-4 text-gray-600">
                Avec une seule carte, accédez à un réseau national de plus de{" "}
                {clubCount} clubs dans toutes les grandes villes du Royaume.
                Entraînez-vous là où vous êtes sans avoir à prendre d'abonnement
                supplémentaire. Un luxe que SEUL City Club vous procure.
              </p>
              <Button className="mt-6 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-bold px-8 py-6 text-lg rounded-xl shadow-lg shadow-orange-500/20 hover:shadow-orange-500/40 transition-all duration-300 hover:scale-105">
                PROGRAMMER UNE VISITE
              </Button>
            </div>

            <div className="rounded-xl overflow-hidden shadow-2xl">
              <img
                src={gymImage}
                alt="City Club Gym"
                className="w-full h-auto"
              />
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};

export default ClubNetworkSection;
