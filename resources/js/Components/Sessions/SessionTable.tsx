import { cn } from "@narsil-ui/Components";
import { Link } from "@inertiajs/react";
import { Monitor, Smartphone, Tablet } from "lucide-react";
import { useTranslationsStore } from "@narsil-ui/Stores/translationStore";
import Button from "@narsil-ui/Components/Button/Button";
import Table from "@narsil-ui/Components/Table/Table";
import TableBody from "@narsil-ui/Components/Table/TableBody";
import TableCell from "@narsil-ui/Components/Table/TableCell";
import TableHead from "@narsil-ui/Components/Table/TableHead";
import TableHeader from "@narsil-ui/Components/Table/TableHeader";
import TableRow from "@narsil-ui/Components/Table/TableRow";

export interface SessionTableProps {
	sessions: SessionModel[];
}

const SessionTable = ({ sessions }: SessionTableProps) => {
	const { trans } = useTranslationsStore();

	return (
		<Table className='w-full'>
			<TableHeader>
				<TableHead>{trans("Device")}</TableHead>
				<TableHead>{trans("validation.attributes.IP")}</TableHead>
				<TableHead>{trans("validation.attributes.status")}</TableHead>
			</TableHeader>
			<TableBody>
				{sessions.map((session, index) => {
					return (
						<TableRow key={index}>
							<TableCell>
								{session.device === "mobile" ? (
									<Smartphone className='h-5 w-5' />
								) : session.device === "tablet" ? (
									<Tablet className='h-5 w-5' />
								) : (
									<Monitor className='h-5 w-5' />
								)}
							</TableCell>
							<TableCell>{session.ip_address}</TableCell>
							<TableCell
								className={cn({
									"text-primary": session.is_current_device,
								})}
							>
								{session.is_current_device ? trans("Current device") : session.last_activity}
							</TableCell>
							<TableCell>
								<Button
									className='text-destructive'
									asChild={true}
									variant='link'
								>
									<Link
										href={route("sessions.destroy", session.id)}
										method='delete'
									>
										{trans("Sign out")}
									</Link>
								</Button>
							</TableCell>
						</TableRow>
					);
				})}
			</TableBody>
		</Table>
	);
};

export default SessionTable;
