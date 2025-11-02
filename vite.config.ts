import { fileURLToPath } from "node:url";
import { wayfinder } from "@laravel/vite-plugin-wayfinder";
import tailwindcss from "@tailwindcss/vite";
import vue from "@vitejs/plugin-vue";
import laravel from "laravel-vite-plugin";
import autoImports from "unplugin-auto-import/vite";
import components from "unplugin-vue-components/vite";
import { defineConfig } from "vite";

export default defineConfig({
	plugins: [
		laravel({
			input: fileURLToPath(new URL("./frontend/app.ts", import.meta.url)),
			refresh: true,
		}),
		wayfinder({
			formVariants: true,
			path: "./frontend/.generated",
		}),
		tailwindcss(),
		vue({
			template: {
				transformAssetUrls: {
					base: null,
					includeAbsolute: false,
				},
			},
		}),
		autoImports({
			dts: "./frontend/.generated/auto-imports.d.ts",
			imports: ["vue", "@vueuse/core"],
			dirs: ["./frontend/composables"],
			vueTemplate: true,
		}),
		components({
			dts: "./frontend/.generated/components.d.ts",
			dirs: ["./frontend/components", "./frontend/layouts"],
			collapseSamePrefixes: true,
			syncMode: "overwrite",
		}),
	],
	resolve: {
		alias: {
			"@/": fileURLToPath(new URL("./frontend/", import.meta.url)),
		},
	},
});
