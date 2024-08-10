import { Link } from "@inertiajs/react";
import { Monitor, Smartphone, Tablet } from "lucide-react";
import { useTranslationsStore } from "@narsil-ui/Stores/translationStore";

import {
	Button,
	Card,
	CardContent,
	CardFooter,
	CardHeader,
	CardTitle,
	Table,
	TableCell,
	TableHead,
	TableHeader,
	TableRow,
} from "@narsil-ui/Components";

const SessionController = ({ sessions }: SessionControllerProps) => {
	const { trans } = useTranslationsStore();

	return (
		<Card>
			<CardHeader>
				<CardTitle>{trans("common.sessions")}</CardTitle>
			</CardHeader>
			<CardContent>
				<Table>
					<TableHeader>
						<TableHead>{trans("validation.attributes.device")}</TableHead>
						<TableHead>{trans("validation.attributes.IP")}</TableHead>
						<TableHead>{trans("validation.attributes.status")}</TableHead>
					</TableHeader>
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
								<TableCell className={`${session.is_current_device ? "text-primary" : ""}`}>
									{session.is_current_device ? trans("common.current_device") : session.last_activity}
								</TableCell>
								<TableCell>
									<Button
										className='text-destructive'
										asChild={true}
										variant='link'
									>
										<Link
											method='delete'
											href={route("sessions.destroy", session.id)}
										>
											{trans("verbs.logout")}
										</Link>
									</Button>
								</TableCell>
							</TableRow>
						);
					})}
				</Table>
			</CardContent>
			<CardFooter>
				<Button asChild={true}>
					<Link href={route("sessions.destroy-other")}>{trans("Log out from other sessions")}</Link>
				</Button>
				<Button
					asChild={true}
					variant='secondary'
				>
					<Link href={route("sessions.destroy-all")}>{trans("Log out of all sessions")}</Link>
				</Button>
			</CardFooter>
		</Card>
	);
};

export default SessionController;
