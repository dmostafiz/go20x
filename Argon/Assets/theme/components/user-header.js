const componentStyles = (theme) => ({
  wrapperBox: {
    [theme.breakpoints.up("md")]: {
      paddingTop: "8rem",
    },
    backgroundSize: "cover",
    backgroundPosition: "center top",
    backgroundImage:
      "url(" + require("./../../img/theme/profile-cover.jpg").default + ")",
  },
  overlayBox: {
    transition: "all .15s ease",
    opacity: ".9",
    background:
    "linear-gradient(87deg," + "#c28813" + ",black)",
  },
  containerRoot: {
    zIndex: 1,
    [theme.breakpoints.up("md")]: {
      paddingLeft: "39px",
      paddingRight: "39px",
    },
  },
  typographyRootH1: {
    color: theme.palette.white.main,
    fontSize: "2.75rem",
    fontWeight: 600,
    lineHeight: 1.5,
  },
  buttonRoot: {
    color: 'white',
    backgroundColor: 'black',
    "&:hover": {
      backgroundColor: 'black',
    },
  },
});

export default componentStyles;
