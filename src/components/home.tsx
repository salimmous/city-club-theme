import React, { useState } from "react";
import Header from "./Header";
import HeroSection from "./HeroSection";
import MembershipSection from "./MembershipSection";
import ClassScheduleSection from "./ClassScheduleSection";
import TrainerSection from "./TrainerSection";
import LocationMapSection from "./LocationMapSection";
import Footer from "./Footer";
import TestimonialCarousel from "./TestimonialCarousel";
import InstagramFeed from "./InstagramFeed";
import MedicalAssessmentSection from "./MedicalAssessmentSection";
import ActivityCarousel from "./ActivityCarousel";
import CertifiedCoachesSection from "./CertifiedCoachesSection";
import ClubNetworkSection from "./ClubNetworkSection";
import FAQSection from "./FAQSection";
import WomenOnlySection from "./WomenOnlySection";

const Home = () => {
  const [selectedLocation, setSelectedLocation] = useState("loc1");

  const handleLocationChange = (locationId: string) => {
    setSelectedLocation(locationId);
  };

  return (
    <div className="min-h-screen bg-white">
      {/* Header */}
      <Header transparent={true} />

      {/* Hero Section with Location Selector */}
      <HeroSection onLocationChange={handleLocationChange} />

      {/* Medical Assessment Section */}
      <MedicalAssessmentSection />

      {/* Activity Carousel */}
      <ActivityCarousel />

      {/* Membership Section */}
      <section id="membership">
        <MembershipSection showComparison={false} />
      </section>

      {/* Certified Coaches Section */}
      <CertifiedCoachesSection />

      {/* Club Network Section */}
      <ClubNetworkSection />

      {/* Class Schedule Section */}
      <section id="classes">
        <ClassScheduleSection
          selectedLocation={selectedLocation}
          onLocationChange={handleLocationChange}
        />
      </section>

      {/* Women Only Section */}
      <WomenOnlySection />

      {/* Trainer Section */}
      <section id="trainers">
        <TrainerSection selectedLocation={selectedLocation} />
      </section>

      {/* Location Map Section */}
      <section id="locations">
        <LocationMapSection />
      </section>

      {/* Testimonial Section */}
      <section id="testimonials" className="py-24 bg-white">
        <div className="container mx-auto px-4">
          <div className="text-center mb-16">
            <div className="flex items-center justify-center mb-4">
              <div className="h-1 w-12 bg-orange-500 rounded-full"></div>
              <div className="h-1 w-1 bg-orange-500 rounded-full mx-1"></div>
              <div className="h-1 w-1 bg-orange-500 rounded-full"></div>
            </div>
            <h2 className="text-4xl md:text-5xl font-bold text-gray-900 mb-6 tracking-tight">
              <span className="relative inline-block">
                <span className="relative z-10">Témoignages</span>
                <span className="absolute bottom-2 left-0 w-full h-3 bg-orange-500/20 -z-10"></span>
              </span>{" "}
              de Nos Membres
            </h2>
            <p className="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
              Découvrez les expériences et transformations de notre communauté
              chez CityClub Maroc.
            </p>
          </div>
          <TestimonialCarousel />
        </div>
      </section>

      {/* FAQ Section */}
      <FAQSection />

      {/* Instagram Feed Section */}
      <section id="social" className="py-24 bg-gray-50">
        <div className="container mx-auto px-4">
          <div className="text-center mb-16">
            <div className="flex items-center justify-center mb-4">
              <div className="h-1 w-12 bg-orange-500 rounded-full"></div>
              <div className="h-1 w-1 bg-orange-500 rounded-full mx-1"></div>
              <div className="h-1 w-1 bg-orange-500 rounded-full"></div>
            </div>
            <h2 className="text-4xl md:text-5xl font-bold text-gray-900 mb-6 tracking-tight">
              <span className="relative inline-block">
                <span className="relative z-10">Suivez-nous</span>
                <span className="absolute bottom-2 left-0 w-full h-3 bg-orange-500/20 -z-10"></span>
              </span>{" "}
              sur Instagram
            </h2>
            <p className="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
              Restez connecté avec notre communauté fitness et inspirez-vous des
              parcours de nos membres.
            </p>
          </div>
          <InstagramFeed columns={3} showCaption={true} showStats={true} />
        </div>
      </section>

      {/* Footer */}
      <Footer />
    </div>
  );
};

export default Home;
