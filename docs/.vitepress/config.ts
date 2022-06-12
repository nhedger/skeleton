import { defineConfig } from "vitepress";

export default defineConfig({
  base: "/skeleton/",
  lang: "es-US",
  title: "Skeleton",
  description: "Composer package template",
  lastUpdated: true,
  markdown: {
    theme: {
      light: "github-light",
      dark: "github-dark",
    },
  },
  themeConfig: {
    sidebar: {
      "/": [
        {
          text: "Introduction",
          items: [
            {
              text: "Installation",
              link: "/guide/installation",
            },
          ],
        },
      ],
    },
  },
});
