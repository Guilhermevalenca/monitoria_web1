import axios from "axios";

const env = import.meta.env;


axios.defaults.baseURL = env.VITE_API_BASEURL;