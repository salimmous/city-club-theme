import { Suspense, lazy } from "react";
import { useRoutes, Routes, Route, Navigate } from "react-router-dom";
import routes from "tempo-routes";
import MainLayout from "./layouts/MainLayout";

// Lazy load components for better performance
const Home = lazy(() => import("./components/home"));
const PlanningPage = lazy(() => import("./components/PlanningPage"));

// Loading component
const LoadingFallback = () => (
  <div className="flex items-center justify-center min-h-screen">
    <div className="animate-spin rounded-full h-12 w-12 border-t-2 border-b-2 border-orange-500"></div>
  </div>
);

function App() {
  return (
    <Suspense fallback={<LoadingFallback />}>
      <>
        <Routes>
          <Route
            path="/"
            element={
              <MainLayout transparentHeader={true}>
                <Home />
              </MainLayout>
            }
          />
          <Route
            path="/planning"
            element={
              <MainLayout>
                <PlanningPage />
              </MainLayout>
            }
          />
          <Route path="*" element={<Navigate to="/" replace />} />

          {/* Add Tempo routes for development */}
          {import.meta.env.VITE_TEMPO === "true" && (
            <Route path="/tempobook/*" element={null} />
          )}
        </Routes>
        {import.meta.env.VITE_TEMPO === "true" && useRoutes(routes)}
      </>
    </Suspense>
  );
}

export default App;
