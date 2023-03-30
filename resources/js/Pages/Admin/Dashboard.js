import React from "react";
// javascipt plugin for creating charts
import Chart from "chart.js";
// react plugin used to create charts
import { Line, Bar } from "react-chartjs-2";
import { makeStyles } from "@material-ui/core/styles";
import { useTheme } from "@material-ui/core/styles";
import Box from "@material-ui/core/Box";
import Card from "@material-ui/core/Card";
import CardContent from "@material-ui/core/CardContent";
import CardHeader from "@material-ui/core/CardHeader";
import Container from "@material-ui/core/Container";
import Grid from "@material-ui/core/Grid";

import Header from "../../../../Argon/Components/Headers/Header.js";
import DashboardLayout from '../../Layouts/DashboardLayout';
import {
  chartOptions,
  parseOptions,
  chartExample1,
  chartExample2,
} from "../../../../Argon/variables/charts.js";
import PaginationLinks from './../../Components/PaginationLinks';
import componentStyles from "../../../../Argon/Assets/theme/views/admin/dashboard";
import AdminUserListTabls from './../../Components/AdminUserListTabls';
import CardActions from '@material-ui/core/CardActions';
import ContactListTableAdmin from './../../Components/ContactListTableAdmin';
import HeaderAdmin from './../../Components/HeaderAdmin';

const useStyles = makeStyles(componentStyles);

function Dashboard({ users, leads, leadsMonth, leadsDataCount }) {
  const classes = useStyles();

  const theme = useTheme();
  const [activeNav, setActiveNav] = React.useState(1);
  const [chartExample1Data, setChartExample1Data] = React.useState("data1");

  if (window.Chart) {
    parseOptions(Chart, chartOptions());
  }

  const toggleNavs = (index) => {
    setActiveNav(index);
    setChartExample1Data("data" + index);
  };
  return (
    <DashboardLayout>

      <HeaderAdmin />

      {/* Page content */}
      <Container
        maxWidth={false}
        component={Box}
        marginTop="-6rem"
        classes={{ root: classes.containerRoot }}
      >
        {/* <Grid container>

          <Grid item xs={12} xl={12}>
            <Card classes={{ root: classes.cardRoot }}>
              <CardHeader
                title={
                  <Box component="span" color={theme.palette.gray[600]}>
                    {new Date().getFullYear()} stats
                  </Box>
                }
                subheader="CONTACTS"
                classes={{ root: classes.cardHeaderRoot }}
                titleTypographyProps={{
                  component: Box,
                  variant: "h6",
                  letterSpacing: ".0625rem",
                  marginBottom: ".25rem!important",
                  classes: {
                    root: classes.textUppercase,
                  },
                }}
                subheaderTypographyProps={{
                  component: Box,
                  variant: "h2",
                  marginBottom: "0!important",
                  color: "initial",
                }}
              ></CardHeader>
              <CardContent>
                <Box position="relative" height="350px">
                  <Bar
                    data={
                      {
                        labels: leadsMonth,
                        datasets: [
                          {
                            label: "Contacts",
                            data: leadsDataCount,
                            maxBarThickness: 30,
                          },
                        ],
                      }
                    }
                    options={
                      {
                        scales: {
                          yAxes: [
                            {
                              ticks: {
                                callback: function (value) {
                                  if (!(value % 10)) {
                                    //return '$' + value + 'k'
                                    return value + ' Contacts';
                                  }
                                },
                              },
                            },
                          ],
                        },
                        tooltips: {
                          callbacks: {
                            label: function (item, data) {
                              var label = data.datasets[item.datasetIndex].label || "";
                              var yLabel = item.yLabel;
                              var content = "";
                              if (data.datasets.length > 1) {
                                content += label;
                              }
                              content += yLabel;
                              return content;
                            },
                          },
                        },
                      }
                    }
                  />
                </Box>
              </CardContent>
            </Card>
          </Grid>
        </Grid> */}

        <Box height={20}></Box>

        <Card mt={5} classes={{ root: classes.cardRoot }}>
          <CardHeader
            className={classes.cardHeader}
            title="Registered users"
            titleTypographyProps={{
              component: Box,
              marginBottom: "0!important",
              variant: "h3",

            }}
          ></CardHeader>

          <AdminUserListTabls users={users} />

          <Box
            classes={{ root: classes.cardActionsRoot }}
            component={CardActions}
            justifyContent="flex-end"
          >

            <PaginationLinks
              data={users}
              path='/admin/users'
            />
          </Box>
        </Card>

        <Box height={20}></Box>

        {/* <Card classes={{ root: classes.cardRoot }}>
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
        </Card> */}

      </Container>
    </DashboardLayout>
  );
}

export default Dashboard;
