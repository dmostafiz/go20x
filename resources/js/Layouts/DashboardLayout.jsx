import React, { Suspense, useEffect, useState } from "react";
// @material-ui/core components
import { makeStyles } from "@material-ui/core/styles";
import Box from "@material-ui/core/Box";
import Container from "@material-ui/core/Container";
import FormControl from "@material-ui/core/FormControl";
import InputAdornment from "@material-ui/core/InputAdornment";
import InputLabel from "@material-ui/core/InputLabel";
import OutlinedInput from "@material-ui/core/OutlinedInput";
// @material-ui/icons components
import Search from "@material-ui/icons/Search";

// core components

import Sidebar from '../../../Argon/Components/Sidebar/Sidebar'
import AdminNavbar from '../../../Argon/Components/Navbars/AdminNavbar'

import componentStyles from "../../../Argon/Assets/theme/layouts/admin";

import Logo from "./../../../Argon/Assets/img/brand/argon-react.png"
import AdminFooter from '../../../Argon/Components/Footers/AdminFooter';
import AdminRoutes from '../Routes/AdminRoutes'
import UserRoutes from '../Routes/UserRoutes'
import NavbarDropdown from '../../../Argon/Components/Dropdowns/NavbarDropdown';


import MasterDashboard from "./MasterDashboard";
import { CircularProgress } from "@material-ui/core";
import auth from './../Hooks/auth';
import { usePage } from "@inertiajs/inertia-react";
import { Alert } from "@mui/material";
// import routes from "./../../../routes.js";
import FlashMessages from './../Components/FlashMessages';

const useStyles = makeStyles(componentStyles);

const DashboardLayout = ({ title = 'Dashboard', header, children }) => {


  const [showingNavigationDropdown, setShowingNavigationDropdown] = useState(false);

  const classes = useStyles();

  useEffect(() => {
    document.documentElement.scrollTop = 0;
    document.scrollingElement.scrollTop = 0;
    // mainContent.current.scrollTop = 0;
  }, []);

  // const getRoutes = (routes) => {
  //   return routes.map((prop, key) => {
  //     if (prop.layout === "/admin") {
  //       return (
  //         <Route
  //           path={prop.layout + prop.path}
  //           component={prop.component}
  //           key={key}
  //         />
  //       );
  //     } else {
  //       return null;
  //     }
  //   });
  // };

  // const getBrandText = () => {
  //   for (let i = 0; i < routes.length; i++) {
  //     if (location.pathname.indexOf(routes[i].layout + routes[i].path) !== -1) {
  //       return routes[i].name;
  //     }
  //   }
  //   return "Brand";
  // };

  return (
    <Suspense fallback={<CircularProgress />}>
      {/* <CssBaseline /> */}

      <Sidebar
        routes={auth().user_type == "admin" ? AdminRoutes : UserRoutes}

        logo={{
          innerLink: "/",
          imgSrc: Logo,
          imgAlt: "...",
        }}

        dropdown={<NavbarDropdown />}

        input={
          <FormControl variant="outlined" fullWidth>
            <InputLabel htmlFor="outlined-adornment-search-responsive">
              Search
            </InputLabel>
            <OutlinedInput
              id="outlined-adornment-search-responsive"
              type="text"
              endAdornment={
                <InputAdornment position="end">
                  <Box
                    component={Search}
                    width="1.25rem!important"
                    height="1.25rem!important"
                  />


                </InputAdornment>
              }
              labelWidth={70}
            />
          </FormControl>
        }
      />

      <Box position="relative" className={classes.mainContent}>

        <AdminNavbar brandText={title} />

        {children}

        <Container
          maxWidth={false}
          component={Box}
          classes={{ root: classes.containerRoot }}
        >
          <AdminFooter />
        </Container>

      </Box>

      <FlashMessages />

    </Suspense>
  );
};

export default DashboardLayout;
