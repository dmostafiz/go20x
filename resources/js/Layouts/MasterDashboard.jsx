import React from 'react'
import CssBaseline from "@material-ui/core/CssBaseline";
import { ThemeProvider } from "@material-ui/core/styles";
import theme from "./../../../Argon/Assets/theme/theme";


export default function MasterDashboard({ children}) {
  return (
    <ThemeProvider theme={theme}>
        {children}
    </ThemeProvider>
  )
}
