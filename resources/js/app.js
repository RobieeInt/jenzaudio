import "./bootstrap";
import "../css/app.css";

import Alpine from "alpinejs";
import intersect from "@alpinejs/intersect";

Alpine.plugin(intersect);

window.Alpine = Alpine;
Alpine.start();
