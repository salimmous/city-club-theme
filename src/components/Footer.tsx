import React from "react";
import {
  Facebook,
  Instagram,
  Twitter,
  Youtube,
  MapPin,
  Phone,
  Mail,
} from "lucide-react";
import { Button } from "./ui/button";
import { Separator } from "./ui/separator";

interface FooterProps {
  clubName?: string;
  locations?: {
    city: string;
    address: string;
  }[];
  contactInfo?: {
    phone: string;
    email: string;
  };
  socialLinks?: {
    facebook?: string;
    instagram?: string;
    twitter?: string;
    youtube?: string;
  };
}

const Footer = ({
  clubName = "CityClub Morocco",
  locations = [
    {
      city: "Casablanca",
      address: "123 Mohammed V Boulevard",
    },
    {
      city: "Marrakech",
      address: "45 Avenue Hassan II",
    },
    {
      city: "Rabat",
      address: "78 Avenue Mohammed VI",
    },
    {
      city: "Tangier",
      address: "12 Boulevard Pasteur",
    },
  ],
  contactInfo = {
    phone: "+212-522-123456",
    email: "info@cityclubmorocco.com",
  },
  socialLinks = {
    facebook: "https://facebook.com",
    instagram: "https://instagram.com",
    twitter: "https://twitter.com",
    youtube: "https://youtube.com",
  },
}: FooterProps) => {
  return (
    <footer className="bg-gray-900 text-white pt-12 pb-6 px-4 md:px-8 relative overflow-hidden">
      {/* Decorative elements */}
      <div className="absolute -top-24 -right-24 w-96 h-96 bg-orange-500 rounded-full opacity-10 blur-3xl"></div>
      <div className="absolute -bottom-24 -left-24 w-96 h-96 bg-teal-500 rounded-full opacity-10 blur-3xl"></div>

      <div className="max-w-7xl mx-auto relative z-10">
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
          {/* Club Info */}
          <div>
            <h3 className="text-xl font-bold mb-4 flex items-center">
              <span className="text-orange-500 font-extrabold">CITY</span>
              <span className="text-teal-500 font-extrabold">CLUB</span>
              <span className="text-orange-400 text-xs ml-0.5 mt-0.5 font-black">
                +
              </span>
            </h3>
            <p className="text-gray-400 mb-4">
              Élevez votre parcours fitness avec la première chaîne de clubs de
              fitness au Maroc. Avec plus de 42 clubs à travers le pays et
              230.000+ adhérents, nous sommes déterminés à vous aider à
              atteindre vos objectifs de santé et de bien-être.
            </p>
            <div className="flex space-x-4">
              {socialLinks.facebook && (
                <a
                  href={socialLinks.facebook}
                  target="_blank"
                  rel="noopener noreferrer"
                  className="text-gray-400 hover:text-orange-500 transition-colors bg-gray-800 p-2 rounded-full hover:scale-110 transition-transform duration-300"
                >
                  <Facebook size={20} />
                </a>
              )}
              {socialLinks.instagram && (
                <a
                  href={socialLinks.instagram}
                  target="_blank"
                  rel="noopener noreferrer"
                  className="text-gray-400 hover:text-orange-500 transition-colors bg-gray-800 p-2 rounded-full hover:scale-110 transition-transform duration-300"
                >
                  <Instagram size={20} />
                </a>
              )}
              {socialLinks.twitter && (
                <a
                  href={socialLinks.twitter}
                  target="_blank"
                  rel="noopener noreferrer"
                  className="text-gray-400 hover:text-orange-500 transition-colors bg-gray-800 p-2 rounded-full hover:scale-110 transition-transform duration-300"
                >
                  <Twitter size={20} />
                </a>
              )}
              {socialLinks.youtube && (
                <a
                  href={socialLinks.youtube}
                  target="_blank"
                  rel="noopener noreferrer"
                  className="text-gray-400 hover:text-orange-500 transition-colors bg-gray-800 p-2 rounded-full hover:scale-110 transition-transform duration-300"
                >
                  <Youtube size={20} />
                </a>
              )}
            </div>
          </div>

          {/* Quick Links */}
          <div>
            <h3 className="text-xl font-bold mb-4 text-orange-500">
              Liens Rapides
            </h3>
            <ul className="space-y-2">
              <li>
                <a
                  href="#"
                  className="text-gray-400 hover:text-white transition-colors flex items-center group"
                >
                  <span className="w-1.5 h-1.5 bg-orange-500 rounded-full mr-2 group-hover:scale-150 transition-transform duration-300"></span>
                  Accueil
                </a>
              </li>
              <li>
                <a
                  href="#"
                  className="text-gray-400 hover:text-white transition-colors flex items-center group"
                >
                  <span className="w-1.5 h-1.5 bg-orange-500 rounded-full mr-2 group-hover:scale-150 transition-transform duration-300"></span>
                  À Propos
                </a>
              </li>
              <li>
                <a
                  href="#"
                  className="text-gray-400 hover:text-white transition-colors flex items-center group"
                >
                  <span className="w-1.5 h-1.5 bg-orange-500 rounded-full mr-2 group-hover:scale-150 transition-transform duration-300"></span>
                  Abonnements
                </a>
              </li>
              <li>
                <a
                  href="#"
                  className="text-gray-400 hover:text-white transition-colors flex items-center group"
                >
                  <span className="w-1.5 h-1.5 bg-orange-500 rounded-full mr-2 group-hover:scale-150 transition-transform duration-300"></span>
                  Activités
                </a>
              </li>
              <li>
                <a
                  href="#"
                  className="text-gray-400 hover:text-white transition-colors flex items-center group"
                >
                  <span className="w-1.5 h-1.5 bg-orange-500 rounded-full mr-2 group-hover:scale-150 transition-transform duration-300"></span>
                  Coachs
                </a>
              </li>
              <li>
                <a
                  href="#"
                  className="text-gray-400 hover:text-white transition-colors flex items-center group"
                >
                  <span className="w-1.5 h-1.5 bg-orange-500 rounded-full mr-2 group-hover:scale-150 transition-transform duration-300"></span>
                  Clubs
                </a>
              </li>
              <li>
                <a
                  href="#"
                  className="text-gray-400 hover:text-white transition-colors flex items-center group"
                >
                  <span className="w-1.5 h-1.5 bg-orange-500 rounded-full mr-2 group-hover:scale-150 transition-transform duration-300"></span>
                  Contact
                </a>
              </li>
            </ul>
          </div>

          {/* Locations */}
          <div>
            <h3 className="text-xl font-bold mb-4 text-teal-500">Nos Clubs</h3>
            <ul className="space-y-3">
              {locations.map((location, index) => (
                <li
                  key={index}
                  className="flex items-start group hover:translate-x-1 transition-transform duration-300"
                >
                  <MapPin className="h-5 w-5 text-orange-500 mr-2 flex-shrink-0 mt-0.5 group-hover:scale-110 transition-transform duration-300" />
                  <div>
                    <span className="font-medium text-white">
                      {location.city}
                    </span>
                    <p className="text-gray-400 text-sm">{location.address}</p>
                  </div>
                </li>
              ))}
            </ul>
          </div>

          {/* Contact & Newsletter */}
          <div>
            <h3 className="text-xl font-bold mb-4 text-orange-500">
              Contactez-Nous
            </h3>
            <div className="space-y-3 mb-6">
              <div className="flex items-start group hover:translate-x-1 transition-transform duration-300">
                <Phone className="h-5 w-5 text-teal-500 mr-2 flex-shrink-0 mt-0.5 group-hover:scale-110 transition-transform duration-300" />
                <span className="text-gray-400">{contactInfo.phone}</span>
              </div>
              <div className="flex items-start group hover:translate-x-1 transition-transform duration-300">
                <Mail className="h-5 w-5 text-teal-500 mr-2 flex-shrink-0 mt-0.5 group-hover:scale-110 transition-transform duration-300" />
                <span className="text-gray-400">{contactInfo.email}</span>
              </div>
            </div>

            <h4 className="font-medium mb-2 text-white">
              Abonnez-vous à notre newsletter
            </h4>
            <div className="flex flex-col sm:flex-row gap-2">
              <input
                type="email"
                placeholder="Votre email"
                className="px-4 py-2 rounded-md bg-gray-800 text-white border border-gray-700 focus:outline-none focus:ring-2 focus:ring-orange-500 transition-all duration-300"
              />
              <Button className="whitespace-nowrap bg-orange-500 hover:bg-orange-600 text-white font-bold relative overflow-hidden group transition-all duration-300 hover:shadow-lg hover:shadow-orange-500/30 hover:scale-105">
                <span className="relative z-10">S'ABONNER</span>
                <span className="absolute inset-0 bg-gradient-to-r from-orange-600 to-orange-400 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
              </Button>
            </div>
          </div>
        </div>

        <Separator className="bg-gray-800 my-6" />

        <div className="flex flex-col md:flex-row justify-between items-center text-gray-400 text-sm">
          <p>
            &copy; {new Date().getFullYear()} {clubName}. All rights reserved.
          </p>
          <div className="flex space-x-4 mt-4 md:mt-0">
            <a href="#" className="hover:text-orange-500 transition-colors">
              Politique de Confidentialité
            </a>
            <a href="#" className="hover:text-orange-500 transition-colors">
              Conditions d'Utilisation
            </a>
            <a href="#" className="hover:text-orange-500 transition-colors">
              Politique des Cookies
            </a>
          </div>
        </div>
      </div>
    </footer>
  );
};

export default Footer;
