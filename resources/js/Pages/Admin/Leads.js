import React from "react";

// @material-ui/core components
import { makeStyles } from "@material-ui/core/styles";
import Box from "@material-ui/core/Box";
import Card from "@material-ui/core/Card";
import CardActions from "@material-ui/core/CardActions";
import CardHeader from "@material-ui/core/CardHeader";
import Container from "@material-ui/core/Container";

import DashboardLayout from '../../Layouts/DashboardLayout';

// core components
import Header from "../../../../Argon/Components/Headers/Header.js";

import componentStyles from "../../../../Argon/Assets/theme/views/admin/tables.js";
import PaginationLinks from './../../Components/PaginationLinks'
import ContactListTableAdmin from './../../Components/ContactListTableAdmin';
import HeaderAdmin from './../../Components/HeaderAdmin';



const useStyles = makeStyles(componentStyles);

const Leads = ({ leads }) => {

  console.log('All leads: ', leads)

  const classes = useStyles();

  return (
    <DashboardLayout title='Contact List'>
      <HeaderAdmin />
      {/* Page content */}
      <Container
        maxWidth={false}
        component={Box}
        marginTop="-6rem"
        classes={{ root: classes.containerRoot }}
      >
        
        <Card classes={{ root: classes.cardRoot }}>
          <CardHeader
            className={classes.cardHeader}
            title="Contact list"
            titleTypographyProps={{
              component: Box,
              marginBottom: "0!important",
              variant: "h3",
            }}
          ></CardHeader>

          <ContactListTableAdmin leads={leads} />

          <Box
            classes={{ root: classes.cardActionsRoot }}
            component={CardActions}
            justifyContent="flex-end"
          >

            <PaginationLinks
              data={leads}
              path='/admin/leads'
            />
          </Box>
        </Card>


      </Container>
    </DashboardLayout>
  );
};

export default Leads;
