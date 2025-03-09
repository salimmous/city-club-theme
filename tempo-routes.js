// This file is used by Tempo to add routes for storyboards
// These routes are only included if the VITE_TEMPO environment variable is set to true

const routes = [
  {
    path: "/tempobook/*",
    element: null, // Tempo will handle this route
  },
];

export default routes;
