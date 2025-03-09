import React from "react";
import { Instagram } from "lucide-react";
import { Card } from "./ui/card";
import "./InstagramFeed.css";

interface InstagramPost {
  id: string;
  imageUrl: string;
  likes: number;
  comments: number;
  caption: string;
  url: string;
}

interface InstagramFeedProps {
  posts?: InstagramPost[];
  columns?: number;
  showCaption?: boolean;
  showStats?: boolean;
}

const InstagramFeed = ({
  posts = [
    {
      id: "1",
      imageUrl:
        "https://images.unsplash.com/photo-1517836357463-d25dfeac3438?w=500&q=80",
      likes: 124,
      comments: 8,
      caption:
        "Séance d'entraînement matinale avec nos incroyables membres! #CityClubMaroc",
      url: "https://instagram.com",
    },
    {
      id: "2",
      imageUrl:
        "https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=500&q=80",
      likes: 89,
      comments: 5,
      caption:
        "Nouveaux équipements viennent d'arriver à notre emplacement de Casablanca! Venez les découvrir.",
      url: "https://instagram.com",
    },
    {
      id: "3",
      imageUrl:
        "https://images.unsplash.com/photo-1574680096145-d05b474e2155?w=500&q=80",
      likes: 212,
      comments: 14,
      caption: "Félicitations à nos membres qui ont terminé le défi fitness!",
      url: "https://instagram.com",
    },
    {
      id: "4",
      imageUrl:
        "https://images.unsplash.com/photo-1518611012118-696072aa579a?w=500&q=80",
      likes: 156,
      comments: 11,
      caption:
        "Rejoignez notre nouveau cours de yoga tous les mardis et jeudis. #YogaLife",
      url: "https://instagram.com",
    },
    {
      id: "5",
      imageUrl:
        "https://images.unsplash.com/photo-1534258936925-c58bed479fcb?w=500&q=80",
      likes: 178,
      comments: 23,
      caption:
        "Rencontrez notre nouveau coach Mohammed! Spécialisé en musculation et conditionnement physique.",
      url: "https://instagram.com",
    },
    {
      id: "6",
      imageUrl:
        "https://images.unsplash.com/photo-1579758629938-03607ccdbaba?w=500&q=80",
      likes: 95,
      comments: 7,
      caption:
        "Smoothies sains après l'entraînement maintenant disponibles dans tous nos clubs!",
      url: "https://instagram.com",
    },
  ],
  columns = 3,
  showCaption = true,
  showStats = true,
}: InstagramFeedProps) => {
  return (
    <div className="w-full bg-white p-4">
      <div className={`instagram-grid cols-${Math.min(columns, 6)}`}>
        {posts.map((post) => (
          <div key={post.id} className="instagram-post shadow-md">
            <a
              href={post.url}
              target="_blank"
              rel="noopener noreferrer"
              className="block"
            >
              <div className="relative">
                <img src={post.imageUrl} alt="Instagram post" />
                <div className="instagram-overlay">
                  {showStats && (
                    <div className="flex items-center space-x-4">
                      <div className="flex items-center">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          className="h-5 w-5 mr-1"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                        >
                          <path
                            strokeLinecap="round"
                            strokeLinejoin="round"
                            strokeWidth={2}
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
                          />
                        </svg>
                        <span>{post.likes}</span>
                      </div>
                      <div className="flex items-center">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          className="h-5 w-5 mr-1"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                        >
                          <path
                            strokeLinecap="round"
                            strokeLinejoin="round"
                            strokeWidth={2}
                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"
                          />
                        </svg>
                        <span>{post.comments}</span>
                      </div>
                    </div>
                  )}
                </div>
              </div>
              {showCaption && (
                <div className="instagram-caption">
                  <p className="text-sm text-gray-600 line-clamp-2">
                    {post.caption}
                  </p>
                </div>
              )}
            </a>
          </div>
        ))}
      </div>
      <div className="mt-4 text-center">
        <a
          href="https://instagram.com"
          target="_blank"
          rel="noopener noreferrer"
          className="instagram-follow"
        >
          <Instagram className="h-5 w-5" />
          <span>Suivez-nous sur Instagram</span>
        </a>
      </div>
    </div>
  );
};

export default InstagramFeed;
