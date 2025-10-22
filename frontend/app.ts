import "@/assets/css/app.css";

import "@/assets/css/app.css";

import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import type { DefineComponent } from "vue";
import { createApp, h } from "vue";

const appName = import.meta.env.VITE_APP_NAME || "Skeleton";

createInertiaApp({
	title: (title) => (title ? `${title} - ${appName}` : appName),
	resolve: (name) =>
		resolvePageComponent(
			`./pages/${name}/_page.vue`,
			import.meta.glob<DefineComponent>("./pages/**/_page.vue"),
		),
	setup({ el, App, props, plugin }) {
		createApp({ render: () => h(App, props) })
			.use(plugin)
			.mount(el);
	},
});
