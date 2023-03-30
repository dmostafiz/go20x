import React from 'react'
import LinearProgress from "@material-ui/core/LinearProgress";
import Menu from "@material-ui/core/Menu";
import MenuItem from "@material-ui/core/MenuItem";
import Table from "@material-ui/core/Table";
import TableBody from "@material-ui/core/TableBody";
import TableCell from "@material-ui/core/TableCell";
import TableContainer from "@material-ui/core/TableContainer";
import TableHead from "@material-ui/core/TableHead";
import TableRow from "@material-ui/core/TableRow";
import Tooltip from "@material-ui/core/Tooltip";
// @material-ui/lab components
import AvatarGroup from "@material-ui/lab/AvatarGroup";
import Pagination from "@material-ui/lab/Pagination";
// @material-ui/icons components
import MoreVert from "@material-ui/icons/MoreVert";
import moment from "moment";
import { Inertia } from "@inertiajs/inertia";
import Button from "@material-ui/core/Button";
import Avatar from "@material-ui/core/Avatar";
import Box from "@material-ui/core/Box";
import { makeStyles } from '@material-ui/core/styles';
import componentStyles from "../../../Argon/Assets/theme/views/admin/tables.js";
import { useTheme } from "@material-ui/core/styles";
import IconButton from '@material-ui/core/IconButton';
import DeleteIcon from '@mui/icons-material/Delete';
import BlockIcon from '@mui/icons-material/Block';
import CheckIcon from '@mui/icons-material/Check';
import RemoveRedEyeIcon from '@mui/icons-material/RemoveRedEye';



const useStyles = makeStyles(componentStyles);

export default function AdminUserListTabls({ users }) {
    const classes = useStyles();
    const theme = useTheme();

    const handleDelete = (leadId) => {
        Inertia.post('/user/delete_lead', { leadId })
    };

    return (
        <TableContainer>
            <Box
                component={Table}
                alignItems="center"
                marginBottom="0!important"
            >
                <TableHead>
                    <TableRow>
                        <TableCell
                            classes={{
                                root:
                                    classes.tableCellRoot + " " + classes.tableCellRootHead,
                            }}
                        >
                            #
                        </TableCell>
                        <TableCell
                            classes={{
                                root:
                                    classes.tableCellRoot + " " + classes.tableCellRootHead,
                            }}
                        >
                            Username
                        </TableCell>
                        <TableCell
                            classes={{
                                root:
                                    classes.tableCellRoot + " " + classes.tableCellRootHead,
                            }}
                        >
                            Full Name
                        </TableCell>

                        <TableCell
                            classes={{
                                root:
                                    classes.tableCellRoot + " " + classes.tableCellRootHead,
                            }}
                        >
                            Email
                        </TableCell>
                        <TableCell
                            classes={{
                                root:
                                    classes.tableCellRoot + " " + classes.tableCellRootHead,
                            }}
                        >
                            Phone
                        </TableCell>
            
                        <TableCell
                            classes={{
                                root:
                                    classes.tableCellRoot + " " + classes.tableCellRootHead,
                            }}
                        >
                            Date
                        </TableCell>

                        <TableCell
                            classes={{
                                root:
                                    classes.tableCellRoot + " " + classes.tableCellRootHead,
                            }}
                        >
                            Login Status
                        </TableCell>

                        <TableCell
                            classes={{
                                root:
                                    classes.tableCellRoot + " " + classes.tableCellRootHead,
                            }}
                        ></TableCell>
                    </TableRow>
                </TableHead>

                <TableBody>
                    {users?.data.map((user, index) =>
                        <TableRow key={index}>
                            <TableCell classes={{ root: classes.tableCellRoot }}>
                                {index + 1}
                            </TableCell>
                            <TableCell classes={{ root: classes.tableCellRoot }}>
                                <Box sx={{ display: 'flex', flexDirection: 'row', justifyItems: 'center', gap: 5 }}>
                                    <Avatar alt={user.name} name={user.name} src={`/storage/profile/${user.avatar}`} sx={{ width: 24, height: 24 }} />
                                    <p>{user.username}</p>
                                </Box>
                            </TableCell>
                            <TableCell classes={{ root: classes.tableCellRoot }}>
                                {user.name}
                            </TableCell>
                            <TableCell classes={{ root: classes.tableCellRoot }}>
                                {user.email}
                            </TableCell>
                            <TableCell classes={{ root: classes.tableCellRoot }}>
                                {user.phone_number}
                            </TableCell>
                       
                            <TableCell classes={{ root: classes.tableCellRoot }}>
                                {moment(user.created_at).format('lll')}
                            </TableCell>

                            <TableCell classes={{ root: classes.tableCellRoot }}>
                                {user.status == 'active' ? <span style={{ color: 'green' }}>Active</span> : <span style={{ color: 'red' }}>Blocked</span>}
                            </TableCell>

                            <TableCell
                                classes={{ root: classes.tableCellRoot }}
                                align="right"
                            >

                                <IconButton onClick={() => Inertia.get(`/admin/user_details/${user.username}`)} color="danger" title="Block">
                                    <RemoveRedEyeIcon color="info" />
                                </IconButton>

                                {user.status == 'active'
                                    ?
                                    <IconButton onClick={() => Inertia.post('/admin/block_user', { userId: user.id, do: 'block' }, { preserveScroll: true })} color="danger" title="Block">
                                        <BlockIcon color="warning" />
                                    </IconButton>
                                    :
                                    <IconButton onClick={() => Inertia.post('/admin/block_user', { userId: user.id, do: 'unblock' }, { preserveScroll: true })} color="danger" title="Unblock">
                                        <CheckIcon color="success" />
                                    </IconButton>
                                }

                                <IconButton onClick={() => Inertia.post('/admin/delete_user', { userId: user.id }, { preserveScroll: true })} color="danger" title="delete">
                                    <DeleteIcon color="error" />
                                </IconButton>

                            </TableCell>
                        </TableRow>)}

                </TableBody>
            </Box>
        </TableContainer>
    )
}
