// core components
import Dashboard from "../../../Argon/Views/Admin/Dashboard.js";
import Icons from "../../../Argon/Views/Admin/Icons.js";
import Login from "../../../Argon/Views/Auth/Login.js";
import Maps from "../../../Argon/Views/Admin/Maps.js";
import Profile from "../../../Argon/Views/Admin/Profile.js";
import Register from "../../../Argon/Views/Auth/Register.js";
import Tables from "../../../Argon/Views/Admin/Tables.js";
// @material-ui/icons components
import AccountCircle from "@material-ui/icons/AccountCircle";
import Dns from "@material-ui/icons/Dns";
import FlashOn from "@material-ui/icons/FlashOn";
import FormatListBulleted from "@material-ui/icons/FormatListBulleted";
import Grain from "@material-ui/icons/Grain";
import LocationOn from "@material-ui/icons/LocationOn";
import Palette from "@material-ui/icons/Palette";
import Person from "@material-ui/icons/Person";
import Tv from "@material-ui/icons/Tv";
import VpnKey from "@material-ui/icons/VpnKey";
// import CampaignIcon from '@mui/icons-material/Campaign';
import { AiOutlineNotification } from "react-icons/ai";
import { CgUserList } from "react-icons/cg";
import { FiUsers } from "react-icons/fi";


var AdminRoutes = [
  {
    path: "/admin/dashboard",
    name: "Dashboard",
    icon: Tv,
    iconColor: "Primary",
  },
  {
    path: "/admin/announcements",
    name: "Announcments",
    icon: AiOutlineNotification,
    iconColor: "Warning",
  },
  // {
  //   path: "/admin/leads",
  //   name: "Contact List",
  //   icon: CgUserList,
  //   iconColor: "Info",
  // },
  {
    path: "/admin/users",
    name: "Registered users",
    icon: FiUsers,
    iconColor: "WarningLight",
  },
  // {
  //   collapse: true,
  //   path: "/admin/icons",
  //   name: "Icons",
  //   icon: Grain,
  //   iconColor: "Primary",
  //   state: "CollapseState"

  // },
  // {
  //   path: "/maps",
  //   name: "Maps",
  //   icon: LocationOn,
  //   iconColor: "Warning",
  //   component: Maps,
  //
  // },
  {
    path: "/admin/profile",
    name: "My Profile",
    icon: Person,
    iconColor: "WarningLight",
  },
  // {
  //   path: "/admin/tables",
  //   name: "Tables",
  //   icon: FormatListBulleted,
  //   iconColor: "Error",
  // },

  // {
  //   divider: true,
  // },
  // {
  //   title: "Documentation",
  // },
  // {
  //   href:
  //     "https://www.creative-tim.com/learning-lab/material-ui/overview/argon-dashboard?ref=admui-admin-sidebar",
  //   name: "Getting started",
  //   icon: FlashOn,
  // },
  // {
  //   href:
  //     "https://www.creative-tim.com/learning-lab/material-ui/colors/argon-dashboard?ref=admui-admin-sidebar",
  //   name: "Foundation",
  //   icon: Palette,
  // },
  // {
  //   href:
  //     "https://www.creative-tim.com/learning-lab/material-ui/alerts/argon-dashboard?ref=admui-admin-sidebar",
  //   name: "Components",
  //   icon: Dns,
  // },
];
export default AdminRoutes;
