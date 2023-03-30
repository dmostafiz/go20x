import React from "react";
// @material-ui/core components
import { makeStyles } from "@material-ui/core/styles";
import Avatar from "@material-ui/core/Avatar";
import Box from "@material-ui/core/Box";
import Button from "@material-ui/core/Button";
import Divider from "@material-ui/core/Divider";
import Hidden from "@material-ui/core/Hidden";
import Menu from "@material-ui/core/Menu";
import MenuItem from "@material-ui/core/MenuItem";
import Typography from "@material-ui/core/Typography";
// @material-ui/icons components
import DirectionsRun from "@material-ui/icons/DirectionsRun";
import EventNote from "@material-ui/icons/EventNote";
import LiveHelp from "@material-ui/icons/LiveHelp";
import Person from "@material-ui/icons/Person";
import Settings from "@material-ui/icons/Settings";

// core components
import componentStyles from "../../Assets/theme/components/navbar-dropdown.js";
import { Link } from "@inertiajs/inertia-react";
import auth from './../../../resources/js/Hooks/auth'

const useStyles = makeStyles(componentStyles);

export default function NavbarDropdown() {

  const classes = useStyles();
  const [anchorEl, setAnchorEl] = React.useState(null);

  const isMenuOpen = Boolean(anchorEl);

  const handleProfileMenuOpen = (event) => {
    setAnchorEl(event.currentTarget);
  };

  const handleMenuClose = () => {
    setAnchorEl(null);
  };

  const menuId = "primary-search-account-menu";
  const renderMenu = (
    <Menu
      anchorEl={anchorEl}
      anchorOrigin={{ vertical: "top", horizontal: "right" }}
      id={menuId}
      keepMounted
      transformOrigin={{ vertical: "top", horizontal: "right" }}
      open={isMenuOpen}
      onClose={handleMenuClose}
    >
      {/* 
      <Box
        display="flex!important"
        alignItems="center!important"
        component={MenuItem}
        onClick={handleMenuClose}
      >
        
        <Link href={`/${auth().user_type}/profile`}>
          <Box
            component={Person}
            width="1.25rem!important"
            height="1.25rem!important"
            marginRight="1rem"
          />
          <span>My profile</span>
        </Link>
      </Box>

      */}


      <Divider component="div" classes={{ root: classes.dividerRoot }} />
      <Link
        method='post'
        as='span'
        href={route('logout')}
        className={`w-full flex items-start pl-3 pr-4 py-2 border-l-4 border-transparent text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 text-base font-medium focus:outline-none transition duration-150 ease-in-out`}
      >
        <Box
          display="flex!important"
          alignItems="center!important"
          component={MenuItem}
          onClick={handleMenuClose}
        >
          <Box
            component={DirectionsRun}
            width="1.25rem!important"
            height="1.25rem!important"
            marginRight="1rem"
          />
          Log Out
        </Box>
      </Link>
    </Menu >
  );

  return (
    <>
      <Button
        edge="end"
        aria-label="account of current user"
        aria-controls={menuId}
        aria-haspopup="true"
        onClick={handleProfileMenuOpen}
        color="inherit"
        classes={{
          label: classes.buttonLabel,
          root: classes.buttonRoot,
        }}
      >
        <Avatar
          alt={auth().name}
          src={`/storage/profile/${auth().avatar}`}
          classes={{
            root: classes.avatarRoot,
          }}
        />
        <Hidden smDown>{auth().name}</Hidden>
      </Button>
      {renderMenu}
    </>
  );
}
